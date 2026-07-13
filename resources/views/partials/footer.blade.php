<footer class="bg-dark text-light pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-4">
                <h5 class="fw-bold">Recipe<span class="text-success">Hub</span></h5>
                <p class="text-secondary small">
                    Discover, cook and share delicious recipes from around the world.
                </p>
            </div>

            <div class="col-md-4">
                <h6 class="fw-semibold">Quick Links</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('home') }}" class="text-secondary text-decoration-none">Home</a></li>
                    <li><a href="{{ route('recipes.index') }}" class="text-secondary text-decoration-none">Recipes</a></li>
                    <li><a href="{{ route('categories.index') }}" class="text-secondary text-decoration-none">Categories</a></li>
                    <li><a href="{{ route('contact') }}" class="text-secondary text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h6 class="fw-semibold">Categories</h6>
                <ul class="list-unstyled small">
                    @foreach (\App\Models\Category::take(4)->get() as $footerCategory)
                        <li>
                            <a href="{{ route('categories.show', $footerCategory->slug) }}"
                               class="text-secondary text-decoration-none">{{ $footerCategory->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <p class="text-secondary small text-center mb-0">
            &copy; {{ date('Y') }} RecipeHub. All rights reserved.
        </p>
    </div>
</footer>
