@props(['module'=>'admin'])
<div class="w-full flex flex-wrap gap-2">
    <span data-theme-name="red" class="theme-btn w-10 h-10 bg-red-500 block ring-red-600 dark:ring-white"></span>
    <span data-theme-name="orange" class="theme-btn w-10 h-10 bg-orange-500 block  ring-orange-600 dark:ring-white"></span>
    <span data-theme-name="amber" class="theme-btn w-10 h-10 bg-amber-500 block  ring-amber-600 dark:ring-white"></span>
    <span data-theme-name="yellow" class="theme-btn w-10 h-10 bg-yellow-500 block  ring-yellow-600 dark:ring-white"></span>
    <span data-theme-name="lime" class="theme-btn w-10 h-10 bg-lime-500 block  ring-lime-600 dark:ring-white"></span>
    <span data-theme-name="green" class="theme-btn w-10 h-10 bg-green-500 block  ring-green-600 dark:ring-white"></span>
    <span data-theme-name="emerald" class="theme-btn w-10 h-10 bg-emerald-500 block  ring-emerald-600 dark:ring-white"></span>
    <span data-theme-name="teal" class="theme-btn w-10 h-10 bg-teal-500 block  ring-teal-600 dark:ring-white"></span>
    <span data-theme-name="cyan" class="theme-btn w-10 h-10 bg-cyan-500 block  ring-cyan-600 dark:ring-white"></span>
    <span data-theme-name="sky" class="theme-btn w-10 h-10 bg-sky-500 block  ring-sky-600 dark:ring-white"></span>
    <span data-theme-name="blue" class="theme-btn w-10 h-10 bg-blue-500 block  ring-blue-600 dark:ring-white"></span>
    <span data-theme-name="indigo" class="theme-btn w-10 h-10 bg-indigo-500 block  ring-indigo-600 dark:ring-white"></span>
    <span data-theme-name="violet" class="theme-btn w-10 h-10 bg-violet-500 block  ring-violet-600 dark:ring-white"></span>
    <span data-theme-name="purple" class="theme-btn w-10 h-10 bg-purple-500 block  ring-purple-600 dark:ring-white"></span>
    <span data-theme-name="fuchsia" class="theme-btn w-10 h-10 bg-fuchsia-500 block  ring-fuchsia-600 dark:ring-white"></span>
    <span data-theme-name="pink" class="theme-btn w-10 h-10 bg-pink-500 block  ring-pink-600 dark:ring-white"></span>
    <span data-theme-name="rose" class="theme-btn w-10 h-10 bg-rose-500 block  ring-rose-600 dark:ring-white"></span>
    <script type="text/javascript">
        const storageKey = '{{$module}}-theme-color';
        function updateActiveButton(currentTheme) {
            document.querySelectorAll('.theme-btn').forEach(btn => {
                const isActive = btn.getAttribute('data-theme-name') === currentTheme;
                btn.classList.toggle('ring-2', isActive);
                btn.classList.toggle('ring-offset-2', isActive);
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const savedTheme = localStorage.getItem(storageKey) || 'orange';
            document.body.setAttribute('data-theme', savedTheme);
            updateActiveButton(savedTheme);

            document.querySelectorAll('.theme-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const theme = btn.getAttribute('data-theme-name');
                    localStorage.setItem(storageKey, theme);
                    document.body.setAttribute('data-theme', theme);
                    updateActiveButton(theme);
                });
            });
        });
    </script>
</div>
