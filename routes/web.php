<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('loadOrders')) {
    function loadOrders(): array
    {
        $file = storage_path('app/orders.json');
        if (file_exists($file)) {
            $json = file_get_contents($file);
            $data = json_decode($json, true);
            return is_array($data) ? $data : [];
        }
        return [];
    }
}

if (!function_exists('saveOrders')) {
    function saveOrders(array $orders): void
    {
        $file = storage_path('app/orders.json');
        if (!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }
        file_put_contents($file, json_encode(array_values($orders)));
    }
}

if (!function_exists('pricingLevels')) {
    function pricingLevels(): array
    {
        return ['High School', 'College', 'Masters', 'PhD'];
    }
}

if (!function_exists('pricingDeadlines')) {
    function pricingDeadlines(): array
    {
        return ['8 Hours', '24 Hours', '48 Hours', '3 Days', '5 Days', '7 Days', '14 Days'];
    }
}

if (!function_exists('defaultPricingMatrix')) {
    function defaultPricingMatrix(): array
    {
        return [
            'High School' => [
                '8 Hours' => 29.6,
                '24 Hours' => 25.6,
                '48 Hours' => 19.6,
                '3 Days' => 17.6,
                '5 Days' => 15.6,
                '7 Days' => 14.6,
                '14 Days' => 12.6,
            ],
            'College' => [
                '8 Hours' => 32.6,
                '24 Hours' => 28.6,
                '48 Hours' => 21.6,
                '3 Days' => 19.6,
                '5 Days' => 17.6,
                '7 Days' => 16.6,
                '14 Days' => 14.6,
            ],
            'Masters' => [
                '8 Hours' => 36.6,
                '24 Hours' => 32.6,
                '48 Hours' => 25.6,
                '3 Days' => 23.6,
                '5 Days' => 21.6,
                '7 Days' => 20.6,
                '14 Days' => 18.6,
            ],
            'PhD' => [
                '8 Hours' => 40.6,
                '24 Hours' => 36.6,
                '48 Hours' => 29.6,
                '3 Days' => 27.6,
                '5 Days' => 25.6,
                '7 Days' => 24.6,
                '14 Days' => 22.6,
            ],
        ];
    }
}

if (!function_exists('loadPricing')) {
    function loadPricing(): array
    {
        $defaults = defaultPricingMatrix();
        $file = storage_path('app/pricing.json');
        if (!file_exists($file)) {
            return $defaults;
        }

        $json = file_get_contents($file);
        $decoded = json_decode($json, true);
        if (!is_array($decoded)) {
            return $defaults;
        }

        $pricing = [];
        foreach (pricingLevels() as $level) {
            foreach (pricingDeadlines() as $deadline) {
                $value = $decoded[$level][$deadline] ?? $defaults[$level][$deadline];
                $pricing[$level][$deadline] = is_numeric($value) ? round((float) $value, 2) : $defaults[$level][$deadline];
            }
        }

        return $pricing;
    }
}

if (!function_exists('savePricing')) {
    function savePricing(array $pricing): void
    {
        $file = storage_path('app/pricing.json');
        if (!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }
        file_put_contents($file, json_encode($pricing, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}

if (!function_exists('defaultHomepageContent')) {
    function defaultHomepageContent(): array
    {
        return [
            'eyebrow' => 'Custom argumentative essay support',
            'hero_title_prefix' => 'Buy',
            'hero_title_highlight' => 'Argumentative Essay',
            'hero_title_suffix' => '',
            'hero_description' => 'Order a custom argumentative essay written to your instructions and citation style. Choose your academic level and deadline, then receive original, research-backed writing with free revisions and 24/7 support.',
            'seo_content' => '',
            'cta_pill' => 'Free revisions | 24/7 support',
            'rating_one_score' => '24/7',
            'rating_one_label' => 'Support',
            'rating_two_score' => 'Free',
            'rating_two_label' => 'Revisions',
            'rating_three_score' => 'Private',
            'rating_three_label' => 'Ordering',
            'card_one_title' => 'Strong Thesis',
            'card_two_title' => 'Research & Evidence',
            'card_two_pill' => 'Credible Sources | Citations',
            'card_three_title' => 'Counterargument',
            'card_four_title' => 'Argumentative Essay',
            'card_four_pill' => 'APA | MLA | Chicago',
        ];
    }
}

if (!function_exists('loadHomepageContent')) {
    function loadHomepageContent(): array
    {
        $defaults = defaultHomepageContent();
        $file = storage_path('app/homepage.json');

        if (!file_exists($file)) {
            return $defaults;
        }

        $json = file_get_contents($file);
        $decoded = json_decode($json, true);
        if (!is_array($decoded)) {
            return $defaults;
        }

        $content = [];
        foreach ($defaults as $key => $fallback) {
            $value = $decoded[$key] ?? null;
            $content[$key] = is_string($value) ? trim($value) : $fallback;
            if ($content[$key] === '') {
                $content[$key] = $fallback;
            }
        }

        return $content;
    }
}

if (!function_exists('saveHomepageContent')) {
    function saveHomepageContent(array $content): void
    {
        $defaults = defaultHomepageContent();
        $payload = [];
        foreach ($defaults as $key => $fallback) {
            $value = $content[$key] ?? $fallback;
            $payload[$key] = is_string($value) ? trim($value) : $fallback;
            if ($payload[$key] === '') {
                $payload[$key] = $fallback;
            }
        }

        $file = storage_path('app/homepage.json');
        if (!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }

        file_put_contents($file, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}

if (!function_exists('defaultPages')) {
    function defaultPages(): array
    {
        return [
            [
                'id' => 1,
                'slug' => 'argumentative-essay-examples',
                'meta_title' => 'Argumentative Essay Examples | Sample Essays With Analysis',
                'meta_description' => 'Review annotated argumentative essay examples that show a clear thesis, evidence-based body paragraphs and a counterargument with rebuttal.',
                'page_title' => 'Argumentative Essay Examples',
                'image_alt_text' => 'Argumentative essay examples',
                'heading_two' => 'Sample Argumentative Essays',
                'type' => 'Post',
                'feature_image' => '',
                'description' => <<<'HTML'
<p>Looking at a well-structured example is one of the fastest ways to understand what an argumentative essay should look like on the page. Each example below highlights the parts of the argument — the thesis, the claims, the evidence and the rebuttal — so you can see how they fit together.</p>
<h2>Example 1: Should schools limit smartphone use during class?</h2>
<p><strong>Thesis:</strong> Schools should restrict smartphone use during class because it improves focus, reduces distraction and encourages students to engage with the lesson rather than the screen.</p>
<p><strong>Claim 1:</strong> Phone use divides attention. Studies on multitasking consistently show that switching between a lesson and a phone lowers retention, even when students believe they are still following along.</p>
<p><strong>Claim 2:</strong> Phone-free classrooms reduce social pressure. When phones are put away, students are less likely to feel the need to check notifications or respond immediately to messages.</p>
<p><strong>Counterargument:</strong> Some argue that phones can be useful research tools and a safety lifeline in emergencies. That concern is fair, but it does not require phones to be out during instruction; a phone can stay in a bag and still be available when genuinely needed.</p>
<h2>Example 2: Is homework still an effective learning tool?</h2>
<p><strong>Thesis:</strong> Homework should be reduced and redesigned, because most assignments reinforce memorisation rather than understanding and take time away from rest and other learning.</p>
<p><strong>Claim 1:</strong> Repetitive worksheets teach compliance, not comprehension. Short, targeted practice beats long sets of similar problems.</p>
<p><strong>Claim 2:</strong> Excessive homework worsens stress and sleep loss, which undermines the learning it is meant to support.</p>
<p><strong>Counterargument:</strong> Proponents say homework builds discipline and study habits. Discipline can be built in fewer, more meaningful assignments, so the goal does not justify the volume.</p>
<h2>What to notice in these examples</h2>
<ul>
<li>Each essay opens with a specific, debatable thesis rather than a statement of fact.</li>
<li>Every claim is paired with reasoning and evidence, not just opinion.</li>
<li>The counterargument is stated fairly and then answered, never ignored.</li>
<li>The tone stays measured and academic throughout.</li>
</ul>
<p>If you are still shaping your position, review our guide on the <a href="/argumentative-essay-thesis">argumentative essay thesis</a> or see <a href="/how-to-write-an-argumentative-essay">how to write an argumentative essay</a> for the full process.</p>
HTML,
            ],
            [
                'id' => 2,
                'slug' => 'argumentative-essay-thesis',
                'meta_title' => 'Argumentative Essay Thesis | How to Write a Strong Thesis Statement',
                'meta_description' => 'Learn how to write a specific, debatable argumentative essay thesis with examples of strong and weak thesis statements.',
                'page_title' => 'Argumentative Essay Thesis',
                'image_alt_text' => 'Argumentative essay thesis statement',
                'heading_two' => 'Writing a Strong Thesis Statement',
                'type' => 'Post',
                'feature_image' => '',
                'description' => <<<'HTML'
<p>The thesis statement is the single sentence that tells your reader exactly what position you are taking and why it matters. A weak thesis states a fact; a strong thesis takes a stand that a reasonable person could dispute and that you can support with evidence.</p>
<h2>What makes a thesis debatable</h2>
<p>A debatable thesis is one where at least two defensible positions exist. If no one could reasonably disagree, you are writing a fact, not an argument.</p>
<ul>
<li><strong>Weak:</strong> Social media is popular among teenagers. (A fact, not an argument.)</li>
<li><strong>Strong:</strong> Schools should limit phone use during class because it improves focus and reduces distraction.</li>
</ul>
<h2>How to build a thesis in three steps</h2>
<ol>
<li><strong>Narrow the topic.</strong> Turn a broad subject into a single, specific question you can answer.</li>
<li><strong>Take a position.</strong> Answer that question with a clear yes or no, or a focused claim.</li>
<li><strong>Preview your reasoning.</strong> Add the main reason (or reasons) that will structure your body paragraphs.</li>
</ol>
<h2>Strong vs weak thesis examples</h2>
<ul>
<li><strong>Weak:</strong> Pollution is bad for the environment.</li>
<li><strong>Strong:</strong> Cities should invest in electric buses because they cut emissions, improve air quality and lower long-term operating costs.</li>
<li><strong>Weak:</strong> There are pros and cons to a four-day school week.</li>
<li><strong>Strong:</strong> A four-day school week improves student well-being without lowering achievement, and districts should adopt it where transportation allows.</li>
</ul>
<h2>Where the thesis belongs</h2>
<p>In most essays the thesis appears at the end of the introduction, so the reader knows the position before the body paragraphs begin. Every claim that follows should connect back to it. If a paragraph does not support the thesis, it probably belongs in a different essay.</p>
<p>For help placing the thesis in context, see <a href="/how-to-start-an-argumentative-essay">how to start an argumentative essay</a> or review our <a href="/argumentative-essay-examples">argumentative essay examples</a>.</p>
HTML,
            ],
            [
                'id' => 3,
                'slug' => 'counterargument-in-an-essay',
                'meta_title' => 'Counterargument in an Essay | How to Address Opposing Views',
                'meta_description' => 'Learn how to write a counterargument and rebuttal in an essay, with a clear structure and examples.',
                'page_title' => 'Counterargument in an Essay',
                'image_alt_text' => 'Counterargument in an essay',
                'heading_two' => 'Addressing the Opposing View',
                'type' => 'Post',
                'feature_image' => '',
                'description' => <<<'HTML'
<p>A counterargument is the strongest objection someone could raise against your position, stated fairly and then answered. Including one shows that you have considered the other side, which makes your own argument more credible rather than weaker.</p>
<h2>Why counterarguments matter</h2>
<ul>
<li>They show the reader you understand the topic rather than ignoring disagreement.</li>
<li>They let you answer objections before the reader raises them.</li>
<li>They force you to test whether your own reasoning actually holds up.</li>
</ul>
<h2>How to structure a counterargument</h2>
<ol>
<li><strong>Acknowledge the opposing view.</strong> State the objection accurately and without exaggeration.</li>
<li><strong>Introduce your rebuttal.</strong> Explain why the objection does not defeat your argument.</li>
<li><strong>Support the rebuttal.</strong> Use reasoning and evidence, just as you do for your own claims.</li>
</ol>
<h2>An example</h2>
<p><strong>Position:</strong> Schools should limit phone use during class.</p>
<p><strong>Counterargument:</strong> Some argue that phones are useful research tools and a safety lifeline, so banning them is impractical.</p>
<p><strong>Rebuttal:</strong> A phone does not need to be in a student&rsquo;s hand during instruction to serve those purposes. It can stay in a bag and remain available in an emergency or for research at the teacher&rsquo;s direction, so the practical benefit is preserved without the distraction.</p>
<h2>Common mistakes to avoid</h2>
<ul>
<li>Building a &ldquo;straw man&rdquo; by misrepresenting the other side to make it easy to knock down.</li>
<li>Stating the objection and then moving on without actually answering it.</li>
<li>Placing the counterargument so late that it feels like an afterthought.</li>
</ul>
<p>The counterargument usually works best as its own paragraph near the end of the body, just before the conclusion. See <a href="/how-to-end-an-argumentative-essay">how to end an argumentative essay</a> to connect it to your closing, or review <a href="/argumentative-essay-examples">argumentative essay examples</a> to see rebuttals in context.</p>
HTML,
            ],
            [
                'id' => 4,
                'slug' => 'argumentative-vs-persuasive-essay',
                'meta_title' => 'Argumentative vs Persuasive Essay | Key Differences',
                'meta_description' => 'Understand the difference between argumentative and persuasive essays, including structure, evidence and tone.',
                'page_title' => 'Argumentative vs Persuasive Essay',
                'image_alt_text' => 'Argumentative vs persuasive essay',
                'heading_two' => 'Key Differences',
                'type' => 'Post',
                'feature_image' => '',
                'description' => <<<'HTML'
<p>Argumentative and persuasive essays both try to convince the reader, but they do it in different ways. Understanding the difference helps you match your essay to what the assignment is actually asking for.</p>
<h2>The core difference</h2>
<p>An <strong>argumentative essay</strong> relies on logic and evidence. It states a claim, supports it with credible sources and then responds to the opposing view with a counterargument and rebuttal.</p>
<p>A <strong>persuasive essay</strong> relies more on emotion and values. It still makes a claim, but it appeals to the reader&rsquo;s feelings, beliefs and sense of right and wrong rather than primarily to evidence.</p>
<h2>Comparing the two</h2>
<table>
<thead><tr><th></th><th>Argumentative</th><th>Persuasive</th></tr></thead>
<tbody>
<tr><td>Primary appeal</td><td>Logic and evidence</td><td>Emotion and values</td></tr>
<tr><td>Use of sources</td><td>Required and central</td><td>Optional or secondary</td></tr>
<tr><td>Counterargument</td><td>Stated and rebutted</td><td>Often downplayed or omitted</td></tr>
<tr><td>Tone</td><td>Measured and academic</td><td>Passionate and personal</td></tr>
</tbody>
</table>
<h2>How to tell which one you need</h2>
<ul>
<li>If the prompt says &ldquo;argue,&rdquo; &ldquo;evaluate&rdquo; or &ldquo;take a position,&rdquo; you are likely writing an argumentative essay.</li>
<li>If the prompt says &ldquo;persuade,&rdquo; &ldquo;convince&rdquo; or &ldquo;win over,&rdquo; you are likely writing a persuasive essay.</li>
<li>When in doubt, check whether sources and a counterargument are required. That is the clearest signal.</li>
</ul>
<h2>Why the distinction matters</h2>
<p>An argumentative essay that only appeals to emotion will feel under-supported, while a persuasive essay overloaded with data may feel cold and miss the assignment. Matching your approach to the genre keeps the essay on target.</p>
<p>If you are preparing an argumentative essay, start with our guide to the <a href="/argumentative-essay-thesis">argumentative essay thesis</a> or review <a href="/how-to-start-an-argumentative-essay">how to start an argumentative essay</a>.</p>
HTML,
            ],
            [
                'id' => 5,
                'slug' => 'how-to-start-an-argumentative-essay',
                'meta_title' => 'How to Start an Argumentative Essay | Strong Introduction',
                'meta_description' => 'Learn how to start an argumentative essay with a hook, background and a clear thesis statement.',
                'page_title' => 'How to Start an Argumentative Essay',
                'image_alt_text' => 'How to start an argumentative essay',
                'heading_two' => 'Opening Your Essay',
                'type' => 'Post',
                'feature_image' => '',
                'description' => <<<'HTML'
<p>The introduction does three jobs: it grabs the reader&rsquo;s attention, gives just enough background to understand the issue, and ends with a clear thesis statement. Getting the start right makes the rest of the essay easier to write.</p>
<h2>1. Open with a hook</h2>
<p>The first sentence should make the reader want to continue. A strong hook can be a striking statistic, a pointed question or a short, relevant example — but it must connect directly to your topic, not just sound dramatic.</p>
<ul>
<li><strong>Statistic:</strong> The average teenager checks a phone dozens of times during a school day.</li>
<li><strong>Question:</strong> Should a device designed to connect us be allowed to divide our attention in class?</li>
</ul>
<h2>2. Provide background</h2>
<p>After the hook, give the context the reader needs to understand the debate. Keep it brief — one or two sentences are usually enough — and avoid diving into the evidence you will present later.</p>
<h2>3. State your thesis</h2>
<p>End the introduction with a specific, debatable thesis that states your position and previews your reasoning. This is the sentence the rest of the essay must support. See our <a href="/argumentative-essay-thesis">argumentative essay thesis</a> guide for help crafting it.</p>
<h2>A sample introduction</h2>
<p>&ldquo;The average teenager checks a phone dozens of times during a school day, often while a lesson is underway. Schools have responded in different ways, from outright bans to permissive policies that leave phones on desks. Schools should limit phone use during class because it improves focus, reduces distraction and encourages students to engage with the lesson.&rdquo;</p>
<h2>Common opening mistakes</h2>
<ul>
<li>Starting with a vague statement like &ldquo;Throughout history&rdquo; that says nothing specific.</li>
<li>Making the introduction too long and burying the thesis.</li>
<li>Introducing claims or evidence that belong in the body paragraphs.</li>
</ul>
<p>Once the introduction is solid, build the argument itself — see <a href="/how-to-write-an-argumentative-essay">how to write an argumentative essay</a> and <a href="/counterargument-in-an-essay">how to handle a counterargument</a>.</p>
HTML,
            ],
            [
                'id' => 6,
                'slug' => 'how-to-end-an-argumentative-essay',
                'meta_title' => 'How to End an Argumentative Essay | Strong Conclusion',
                'meta_description' => 'Learn how to end an argumentative essay by restating the thesis, summarizing the argument and closing with impact.',
                'page_title' => 'How to End an Argumentative Essay',
                'image_alt_text' => 'How to end an argumentative essay',
                'heading_two' => 'Writing a Strong Conclusion',
                'type' => 'Post',
                'feature_image' => '',
                'description' => <<<'HTML'
<p>The conclusion is your last chance to leave the reader with a clear sense of your position and why it holds. A strong ending restates the thesis, ties the argument together and closes with impact — without introducing anything new.</p>
<h2>1. Restate the thesis</h2>
<p>Return to your thesis, but rephrase it rather than copying it word for word. You have now presented the evidence, so the restatement should sound like a position that has been earned rather than merely announced.</p>
<h2>2. Summarise the argument</h2>
<p>Briefly connect the main claims back to the thesis. Do not repeat every detail; one or two sentences that trace the shape of your reasoning are enough.</p>
<h2>3. Close with impact</h2>
<p>End on a sentence that gives the reader a reason to remember the argument — a call to action, a look at the larger implication, or a return to the idea in your hook. Aim for a note of resolution rather than a brand-new claim.</p>
<h2>A sample conclusion</h2>
<p>&ldquo;Limiting phone use during class is not about rejecting technology but about protecting the focus that learning requires. When phones are put away, students retain more, participate more fully and feel less pressure to respond to every notification. Schools that treat the classroom as a place for undivided attention give their students the conditions they need to succeed.&rdquo;</p>
<h2>Common conclusion mistakes</h2>
<ul>
<li>Introducing a new argument or piece of evidence at the last minute.</li>
<li>Apologising with phrases like &ldquo;this is just my opinion.&rdquo;</li>
<li>Ending abruptly without linking the argument back to the thesis.</li>
</ul>
<p>The conclusion usually follows the counterargument paragraph, so see <a href="/counterargument-in-an-essay">how to write a counterargument</a> to position it correctly, or review <a href="/argumentative-essay-examples">argumentative essay examples</a> for full essays.</p>
HTML,
            ],
        ];
    }
}

if (!function_exists('loadPages')) {
    function loadPages(): array
    {
        $file = storage_path('app/pages.json');
        if (!file_exists($file)) {
            return defaultPages();
        }

        $json = file_get_contents($file);
        $data = json_decode($json, true);
        return is_array($data) ? array_values($data) : defaultPages();
    }
}

if (!function_exists('savePages')) {
    function savePages(array $pages): void
    {
        $file = storage_path('app/pages.json');
        if (!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }

        file_put_contents($file, json_encode(array_values($pages), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}

if (!function_exists('makePageSlug')) {
    function makePageSlug(string $title, array $pages, ?int $exceptId = null): string
    {
        $base = strtolower(trim($title));
        $base = preg_replace('/[^a-z0-9]+/i', '-', $base ?? '');
        $base = trim((string) $base, '-');
        if ($base === '') {
            $base = 'page';
        }

        $slug = $base;
        $i = 2;
        $used = collect($pages)
            ->filter(fn ($page) => (int) ($page['id'] ?? 0) !== (int) ($exceptId ?? 0))
            ->pluck('slug')
            ->filter(fn ($s) => is_string($s) && $s !== '')
            ->values()
            ->all();

        while (in_array($slug, $used, true)) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }
}

if (!function_exists('pricePerPageFor')) {
    function pricePerPageFor(?string $level, ?string $deadline): float
    {
        $pricing = loadPricing();
        $level = trim((string) ($level ?? 'College'));
        $deadline = trim((string) ($deadline ?? '48 Hours'));

        if (isset($pricing[$level][$deadline])) {
            return (float) $pricing[$level][$deadline];
        }

        foreach ($pricing as $savedLevel => $rows) {
            if (strcasecmp($savedLevel, $level) !== 0) {
                continue;
            }
            foreach ($rows as $savedDeadline => $value) {
                if (strcasecmp($savedDeadline, $deadline) === 0) {
                    return (float) $value;
                }
            }
        }

        return (float) ($pricing['College']['48 Hours'] ?? 21.6);
    }
}

Route::get('/', function () {
    $pricing = loadPricing();
    $minPrice = null;
    foreach ($pricing as $rows) {
        foreach ($rows as $value) {
            $value = (float) $value;
            if ($value > 0 && ($minPrice === null || $value < $minPrice)) {
                $minPrice = $value;
            }
        }
    }

    return view('welcome', [
        'homeContent' => loadHomepageContent(),
        'minPrice' => $minPrice,
    ]);
});

Route::get('/pages', function () {
    $pages = loadPages();
    return view('pages.index', ['pages' => $pages]);
})->name('pages.index');

Route::get('/pages/{slug}', function ($slug) {
    return redirect()->route('pages.show', ['slug' => (string) $slug], 301);
})->name('pages.show.legacy');

Route::get('/writers', function () {
    $writers = [
        ['area' => 'Business & Management', 'topics' => 'Business plans, management, marketing and organizational behavior.'],
        ['area' => 'Nursing & Healthcare', 'topics' => 'Nursing practice, healthcare policy and patient care topics.'],
        ['area' => 'Technology & IT', 'topics' => 'Computer science, information systems and emerging technology.'],
        ['area' => 'Literature & History', 'topics' => 'Literary analysis, historical argument and source-based writing.'],
        ['area' => 'Economics & Finance', 'topics' => 'Economic reasoning, financial analysis and data-backed argument.'],
    ];

    return view('writers', ['writers' => $writers]);
})->name('writers.index');

Route::get('/order', function () {
    return view('order');
})->name('order');

Route::get('/order/create', function () {
    return view('order-form', [
        'pricing' => loadPricing(),
    ]);
})->name('order.create');

Route::post('/customer/register', function (\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'email' => 'required|email',
        'name' => 'required|string|max:255',
        'password' => 'required|string|min:6',
        'phone_country' => 'nullable|string|max:50',
        'phone_number' => 'nullable|string|max:30',
    ]);

    session([
        'customer_logged_in' => true,
        'customer_email' => $data['email'],
        'customer_name' => $data['name'],
    ]);

    return redirect()->route('customer.dashboard');
})->name('customer.register');

Route::post('/customer/login', function (\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // For demo purposes we accept any credentials; in production verify against DB.
    session([
        'customer_logged_in' => true,
        'customer_email' => $data['email'],
        'customer_name' => strstr($data['email'], '@', true) ?: 'Customer',
    ]);

    return redirect()->route('customer.dashboard');
})->name('customer.login');

Route::get('/customer/logout', function () {
    session()->forget(['customer_logged_in', 'customer_email', 'customer_name']);
    return redirect()->route('order', ['tab' => 'existing']);
})->name('customer.logout');

Route::get('/customer/dashboard', function () {
    if (!session('customer_logged_in')) {
        return redirect()->route('order', ['tab' => 'existing']);
    }
    $orders = loadOrders();
    if (empty($orders) && session()->has('orders')) {
        $orders = session('orders');
        saveOrders($orders);
    }
    $orders = collect($orders)->where('customer_email', session('customer_email'))->values()->all();
    return view('customer.dashboard', ['orders' => $orders]);
})->name('customer.dashboard');

Route::post('/order/submit', function (\Illuminate\Http\Request $request) {
    if (!session('customer_logged_in')) {
        return redirect()->route('order', ['tab' => 'existing']);
    }

    $data = $request->validate([
        'title' => 'nullable|string|max:255',
        'type' => 'nullable|string|max:100',
        'level' => 'nullable|string|max:50',
        'format' => 'nullable|string|max:50',
        'spacing' => 'nullable|string|max:20',
        'deadline' => 'nullable|string|max:50',
        'category' => 'nullable|string|max:50',
        'subject' => 'nullable|string|max:100',
        'instructions' => 'nullable|string',
        'pages' => 'nullable|integer|min:1',
        'sources' => 'nullable|integer|min:0',
        'slides' => 'nullable|integer|min:0',
        'charts' => 'nullable|integer|min:0',
    ]);

    $orders = loadOrders();
    $id = (collect($orders)->max('id') ?? 802) + 1;
    $pages = $data['pages'] ?? 1;
    $selectedLevel = $data['level'] ?? 'College';
    $selectedDeadline = $data['deadline'] ?? '48 Hours';
    $pricePerPage = pricePerPageFor($selectedLevel, $selectedDeadline);
    $orders[] = [
        'id' => $id,
        'title' => $data['title'] ?? 'Untitled Paper',
        'pages' => $pages,
        'cost' => round($pages * $pricePerPage, 2),
        'status' => 'pending',
        'deadline' => $selectedDeadline,
        'level' => $selectedLevel,
        'type' => $data['type'] ?? 'Essay',
        'format' => $data['format'] ?? 'APA',
        'spacing' => $data['spacing'] ?? 'Double',
        'category' => $data['category'] ?? 'Standard',
        'subject' => $data['subject'] ?? 'Other',
        'sources' => $data['sources'] ?? 0,
        'slides' => $data['slides'] ?? 0,
        'charts' => $data['charts'] ?? 0,
        'customer_email' => session('customer_email', 'customer'),
        'customer_name' => session('customer_name', 'Customer'),
    ];
    saveOrders($orders);
    session(['orders' => $orders]); // keep for customer view convenience

    return redirect()->route('customer.dashboard');
})->name('order.submit');

Route::get('/customer/orders/{id}', function ($id) {
    if (!session('customer_logged_in')) {
        return redirect()->route('order', ['tab' => 'existing']);
    }
    $orders = loadOrders();
    $order = collect($orders)->where('customer_email', session('customer_email'))->firstWhere('id', (int)$id);
    if (!$order) {
        return redirect()->route('customer.dashboard');
    }
    $files = collect(session('order_files', []))->where('order_id', (int)$id)->values()->all();
    return view('customer.order', ['order' => $order, 'files' => $files]);
})->name('customer.order.show');

Route::post('/customer/orders/{id}/files', function (\Illuminate\Http\Request $request, $id) {
    if (!session('customer_logged_in')) {
        return redirect()->route('order', ['tab' => 'existing']);
    }
    $orders = loadOrders();
    $order = collect($orders)->where('customer_email', session('customer_email'))->firstWhere('id', (int)$id);
    if (!$order) {
        return redirect()->route('customer.dashboard');
    }

    $request->validate([
        'files.*' => 'file|max:5120', // 5MB each for demo
    ]);

    $stored = session('order_files', []);
    $dir = storage_path('app/uploads');
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    foreach ($request->file('files', []) as $file) {
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move($dir, $name);
        $stored[] = [
            'order_id' => (int)$id,
            'name' => $file->getClientOriginalName(),
            'path' => $name,
            'date' => now()->toDateTimeString(),
        ];
    }
    session(['order_files' => $stored]);

    return back()->with('uploaded', 'Files uploaded successfully.');
})->name('customer.order.files');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $email = $request->input('email');
    $password = $request->input('password');

    if ($email === 'admin@demo.com' && $password === 'admin123') {
        session([
            'admin_logged_in' => true,
            'admin_name' => 'Admin',
            'admin_email' => $email,
        ]);
        return redirect('/admin');
    }

    return back()->withErrors([
        'credentials' => 'Invalid email or password.',
    ])->withInput();
})->name('admin.login.submit');

Route::get('/admin/logout', function () {
    session()->forget(['admin_logged_in', 'admin_name', 'admin_email']);
    return redirect()->route('admin.login');
})->name('admin.logout');

Route::get('/admin', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    $orders = loadOrders();
    if (empty($orders) && session()->has('orders')) {
        $orders = session('orders');
        saveOrders($orders);
    }
    return view('admin.dashboard', [
        'orders' => $orders,
    ]);
})->name('admin.dashboard');

Route::get('/admin/homepage', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    return view('admin.homepage', [
        'homeContent' => loadHomepageContent(),
    ]);
})->name('admin.homepage');

Route::post('/admin/homepage-content', function (\Illuminate\Http\Request $request) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $data = $request->validate([
        'eyebrow' => 'required|string|max:120',
        'hero_title_prefix' => 'nullable|string|max:120',
        'hero_title_highlight' => 'required|string|max:120',
        'hero_title_suffix' => 'nullable|string|max:180',
        'hero_description' => 'required|string|max:2000',
        'seo_content' => 'nullable|string|max:200000',
        'cta_pill' => 'required|string|max:120',
        'rating_one_score' => 'required|string|max:30',
        'rating_one_label' => 'required|string|max:60',
        'rating_two_score' => 'required|string|max:30',
        'rating_two_label' => 'required|string|max:60',
        'rating_three_score' => 'required|string|max:30',
        'rating_three_label' => 'required|string|max:60',
        'card_one_title' => 'required|string|max:80',
        'card_two_title' => 'required|string|max:80',
        'card_two_pill' => 'required|string|max:120',
        'card_three_title' => 'required|string|max:80',
        'card_four_title' => 'required|string|max:80',
        'card_four_pill' => 'required|string|max:120',
    ]);

    saveHomepageContent($data);

    return back()->with('homepage_saved', 'Homepage content updated successfully.');
})->name('admin.homepage.update');

Route::get('/admin/pages', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $pages = loadPages();
    return view('admin.pages', ['pages' => $pages]);
})->name('admin.pages');

Route::get('/admin/pages/create', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    return view('admin.page-form', [
        'mode' => 'create',
        'pageData' => [
            'meta_title' => '',
            'meta_description' => '',
            'page_title' => '',
            'image_alt_text' => '',
            'heading_two' => '',
            'type' => 'Post',
            'description' => '',
            'feature_image' => '',
        ],
    ]);
})->name('admin.pages.create');

Route::post('/admin/pages', function (\Illuminate\Http\Request $request) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $data = $request->validate([
        'meta_title' => 'required|string|max:180',
        'meta_description' => 'required|string|max:400',
        'page_title' => 'required|string|max:180',
        'image_alt_text' => 'required|string|max:180',
        'heading_two' => 'required|string|max:180',
        'type' => 'required|string|in:Post,Page',
        'description' => 'required|string|max:50000',
        'feature_image' => 'nullable|string|max:2000',
    ]);

    $pages = loadPages();
    $id = (collect($pages)->max('id') ?? 0) + 1;
    $slug = makePageSlug($data['page_title'], $pages);

    $pages[] = [
        'id' => $id,
        'slug' => $slug,
        'meta_title' => trim($data['meta_title']),
        'meta_description' => trim($data['meta_description']),
        'page_title' => trim($data['page_title']),
        'image_alt_text' => trim($data['image_alt_text']),
        'heading_two' => trim($data['heading_two']),
        'type' => trim($data['type']),
        'description' => trim($data['description']),
        'feature_image' => trim((string) ($data['feature_image'] ?? '')),
        'created_at' => now()->toDateTimeString(),
        'updated_at' => now()->toDateTimeString(),
    ];

    savePages($pages);

    return redirect()->route('admin.pages')->with('page_saved', 'Page posted successfully.');
})->name('admin.pages.store');

Route::get('/admin/pages/{id}/edit', function ($id) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $page = collect(loadPages())->firstWhere('id', (int) $id);
    if (!$page) {
        return redirect()->route('admin.pages');
    }

    return view('admin.page-form', [
        'mode' => 'edit',
        'pageData' => $page,
    ]);
})->name('admin.pages.edit');

Route::post('/admin/pages/{id}', function (\Illuminate\Http\Request $request, $id) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $data = $request->validate([
        'meta_title' => 'required|string|max:180',
        'meta_description' => 'required|string|max:400',
        'page_title' => 'required|string|max:180',
        'image_alt_text' => 'required|string|max:180',
        'heading_two' => 'required|string|max:180',
        'type' => 'required|string|in:Post,Page',
        'description' => 'required|string|max:50000',
        'feature_image' => 'nullable|string|max:2000',
    ]);

    $pages = loadPages();
    $targetId = (int) $id;
    $exists = false;
    foreach ($pages as &$page) {
        if ((int) ($page['id'] ?? 0) !== $targetId) {
            continue;
        }

        $page['slug'] = makePageSlug($data['page_title'], $pages, $targetId);
        $page['meta_title'] = trim($data['meta_title']);
        $page['meta_description'] = trim($data['meta_description']);
        $page['page_title'] = trim($data['page_title']);
        $page['image_alt_text'] = trim($data['image_alt_text']);
        $page['heading_two'] = trim($data['heading_two']);
        $page['type'] = trim($data['type']);
        $page['description'] = trim($data['description']);
        $page['feature_image'] = trim((string) ($data['feature_image'] ?? ''));
        $page['updated_at'] = now()->toDateTimeString();
        $exists = true;
        break;
    }
    unset($page);

    if (!$exists) {
        return redirect()->route('admin.pages');
    }

    savePages($pages);

    return redirect()->route('admin.pages')->with('page_saved', 'Page updated successfully.');
})->name('admin.pages.update');

Route::post('/admin/pages/{id}/delete', function ($id) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $pages = loadPages();
    $targetId = (int) $id;
    $pages = collect($pages)
        ->reject(fn ($page) => (int) ($page['id'] ?? 0) === $targetId)
        ->values()
        ->all();
    savePages($pages);

    return redirect()->route('admin.pages')->with('page_saved', 'Page deleted successfully.');
})->name('admin.pages.delete');

Route::get('/admin/pages/{id}/preview', function ($id) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $page = collect(loadPages())->firstWhere('id', (int) $id);
    if (!$page) {
        return redirect()->route('admin.pages');
    }

    return view('admin.page-preview', ['page' => $page]);
})->name('admin.pages.preview');

Route::get('/admin/orders', function (\Illuminate\Http\Request $request) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    $status = $request->query('status');
    $orders = loadOrders();
    if (empty($orders) && session()->has('orders')) {
        $orders = session('orders');
        saveOrders($orders);
    }
    $orders = collect($orders);
    if ($status) {
        $orders = $orders->where('status', $status);
    }
    $orders = $orders->values()->all();
    $writers = [
        ['id' => 1, 'name' => 'Alice Writer'],
        ['id' => 2, 'name' => 'Brian Smith'],
        ['id' => 3, 'name' => 'Carol Johnson'],
    ];
    return view('admin.orders', [
        'orders' => $orders,
        'status' => $status,
        'writers' => $writers,
    ]);
})->name('admin.orders');

Route::post('/admin/orders/{id}/assign', function (\Illuminate\Http\Request $request, $id) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    $data = $request->validate([
        'writer_id' => 'required',
        'writer_name' => 'required|string|max:255',
        'status' => 'nullable|string|max:50',
    ]);
    $orders = loadOrders();
    foreach ($orders as &$order) {
        if ($order['id'] === (int)$id) {
            $order['writer_id'] = $data['writer_id'];
            $order['writer_name'] = $data['writer_name'];
            $order['status'] = $data['status'] ?? 'assigned';
            break;
        }
    }
    saveOrders($orders);
    session(['orders' => $orders]); // keep session copy in sync
    return back()->with('assigned', 'Order assigned successfully.');
})->name('admin.orders.assign');

Route::get('/admin/orders/{id}', function ($id) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    $orders = loadOrders();
    $order = collect($orders)->firstWhere('id', (int)$id);
    if (!$order) {
        return redirect()->route('admin.orders');
    }
    $files = collect(session('order_files', []))->where('order_id', (int)$id)->values()->all();
    return view('admin.order-show', ['order' => $order, 'files' => $files]);
})->name('admin.order.show');

Route::get('/admin/courses', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $courses = [
        ['id' => 1, 'name' => 'Business', 'active_writers' => 3],
        ['id' => 2, 'name' => 'Nursing', 'active_writers' => 2],
        ['id' => 3, 'name' => 'Technology', 'active_writers' => 4],
        ['id' => 4, 'name' => 'Literature', 'active_writers' => 2],
        ['id' => 5, 'name' => 'Economics', 'active_writers' => 3],
        ['id' => 6, 'name' => 'History', 'active_writers' => 2],
    ];

    return view('admin.courses', ['courses' => $courses]);
})->name('admin.courses');

Route::get('/admin/clients', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $orders = loadOrders();
    $clients = collect($orders)
        ->groupBy(fn ($order) => $order['customer_email'] ?? 'customer@example.com')
        ->map(function ($rows, $email) {
            $first = $rows->first();
            return [
                'name' => $first['customer_name'] ?? (strstr((string) $email, '@', true) ?: 'Client'),
                'email' => $email,
                'orders' => $rows->count(),
                'spent' => round($rows->sum(fn ($row) => (float) ($row['cost'] ?? 0)), 2),
            ];
        })
        ->values()
        ->all();

    return view('admin.clients', ['clients' => $clients]);
})->name('admin.clients');

Route::get('/admin/writers', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $defaults = collect([
        ['id' => 1, 'name' => 'Alice Writer'],
        ['id' => 2, 'name' => 'Brian Smith'],
        ['id' => 3, 'name' => 'Carol Johnson'],
    ]);

    $orders = loadOrders();
    $writers = $defaults->map(function ($writer) use ($orders) {
        $assigned = collect($orders)->where('writer_name', $writer['name']);
        return [
            'id' => $writer['id'],
            'name' => $writer['name'],
            'orders' => $assigned->count(),
            'status' => $assigned->isEmpty() ? 'Available' : 'Active',
        ];
    })->values()->all();

    return view('admin.writers', ['writers' => $writers]);
})->name('admin.writers');

Route::get('/admin/settings', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    return view('admin.settings', [
        'levels' => pricingLevels(),
        'deadlines' => pricingDeadlines(),
        'pricing' => loadPricing(),
    ]);
})->name('admin.settings');

Route::post('/admin/settings', function (\Illuminate\Http\Request $request) {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    $levels = pricingLevels();
    $deadlines = pricingDeadlines();
    $current = loadPricing();
    $submitted = $request->input('prices', []);
    $updated = [];

    foreach ($levels as $level) {
        foreach ($deadlines as $deadline) {
            $raw = $submitted[$level][$deadline] ?? $current[$level][$deadline] ?? null;

            if (!is_numeric($raw)) {
                return back()->withErrors([
                    'prices' => "Invalid price for {$level} / {$deadline}.",
                ])->withInput();
            }

            $updated[$level][$deadline] = round(max(0, (float) $raw), 2);
        }
    }

    savePricing($updated);

    return back()->with('settings_saved', 'Pricing settings updated successfully.');
})->name('admin.settings.update');

Route::get('/sitemap.xml', function () {
    $baseUrl = rtrim((string) config('app.url'), '/');
    $urls = [
        $baseUrl . '/',
        $baseUrl . '/writers',
    ];

    $staticPages = config('site', []);
    foreach ($staticPages as $slug => $page) {
        $urls[] = $baseUrl . '/' . $slug;
    }

    foreach (loadPages() as $page) {
        if (!empty($page['slug'])) {
            $urls[] = $baseUrl . '/' . $page['slug'];
        }
    }

    $urls = array_values(array_unique($urls));
    sort($urls);

    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
    foreach ($urls as $url) {
        $xml .= "  <url><loc>" . htmlspecialchars($url, ENT_XML1, 'UTF-8') . "</loc></url>\n";
    }
    $xml .= "</urlset>\n";

    return response($xml, 200, ['Content-Type' => 'application/xml']);
});

// Legacy URL redirects (resolves previously 404ing navigation links).
Route::redirect('/services2', '/argumentative-essay-writing-service', 301);
Route::redirect('/about-us2', '/about-us', 301);
Route::redirect('/faqs2', '/', 301);

Route::get('/{slug}', function ($slug) {
    $slug = trim((string) $slug);
    if ($slug === '') {
        abort(404);
    }

    $staticPages = config('site', []);
    if (isset($staticPages[$slug])) {
        return view('static-page', ['page' => array_merge(['slug' => $slug], $staticPages[$slug])]);
    }

    $page = collect(loadPages())->firstWhere('slug', $slug);
    if (!$page) {
        abort(404);
    }

    return view('pages.show', ['page' => $page]);
})->where('slug', '[A-Za-z0-9\-]+')->name('pages.show');
