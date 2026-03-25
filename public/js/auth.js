/* 
    Frontend Logic for Login and Signup 
*/

const showAlert = (type, msg) => {
    hideAlert();
    const markup = `<div class="alert alert--${type}">${msg}</div>`;
    document.querySelector('body').insertAdjacentHTML('afterbegin', markup);
    window.setTimeout(hideAlert, 5000);
};

const hideAlert = () => {
    const el = document.querySelector('.alert');
    if (el) el.parentElement.removeChild(el);
};

// Login Implementation
const loginForm = document.querySelector('.form--login');
if (loginForm) {
    loginForm.addEventListener('submit', async e => {
        e.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const res = await fetch('/api/v1/users/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ email, password })
            });

            const data = await res.json();

            if (data.status === 'success') {
                showAlert('success', 'Logged in successfully!');
                window.setTimeout(() => {
                    location.assign('/');
                }, 1500);
            } else {
                showAlert('error', data.message);
            }
        } catch (err) {
            showAlert('error', 'Something went wrong! Try again later.');
        }
    });
}

// Signup Implementation
const signupForm = document.querySelector('.form--signup');
if (signupForm) {
    signupForm.addEventListener('submit', async e => {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const passwordConfirm = document.getElementById('passwordConfirm').value;

        if (password !== passwordConfirm) {
            return showAlert('error', 'Passwords do not match!');
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const res = await fetch('/api/v1/users/signup', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ name, email, password, passwordConfirm })
            });

            const data = await res.json();

            if (data.status === 'success') {
                showAlert('success', 'Account created! Redirecting...');
                window.setTimeout(() => {
                    location.assign('/');
                }, 1500);
            } else {
                // Handle CI4 validation errors
                const errorMsg = data.errors ? Object.values(data.errors).join('. ') : data.message;
                showAlert('error', errorMsg);
            }
        } catch (err) {
            showAlert('error', 'Something went wrong! Try again later.');
        }
    });
}
