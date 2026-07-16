// theme code 
import './bootstrap';
const userPref = localStorage.getItem('theme');
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
const body = document.body;
const icon = document.getElementById('themeIcon');

// Apply theme
function applyTheme(theme)
{
    if (theme === 'dark')
        {
            body.classList.add('dark');
            icon.className = 'bi bi-sun';
        }
        else
        {
            body.classList.remove('dark');
            icon.className = 'bi bi-moon';
        }
}

// Initial check
if (userPref)
{
    applyTheme(userPref);
}
else
{
    applyTheme(prefersDark ? 'dark' : 'light');
}

// Toggle handler
document.getElementById('darkModeToggle').addEventListener('click', () =>
{
    const isDark = body.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    icon.className = isDark ? 'bi bi-sun' : 'bi bi-moon';
});
