/* 
    Frontend Logic for User Account Management
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

// Update User Data
const userDataForm = document.querySelector('.form-user-data');
if (userDataForm) {
    userDataForm.addEventListener('submit', async e => {
        e.preventDefault();
        const form = new FormData();
        form.append('name', document.getElementById('name').value);
        form.append('email', document.getElementById('email').value);
        if (document.getElementById('photo').files[0]) {
            form.append('photo', document.getElementById('photo').files[0]);
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const res = await fetch('/api/v1/users/updateMe', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: form
            });

            const data = await res.json();

            if (data.status === 'success') {
                showAlert('success', 'Data updated successfully!');
                window.setTimeout(() => {
                    location.reload(true);
                }, 1500);
            } else {
                showAlert('error', data.message || 'Error updating data');
            }
        } catch (err) {
            showAlert('error', 'Something went wrong!');
        }
    });
}

// Update Password
const userPasswordForm = document.querySelector('.form-user-password');
if (userPasswordForm) {
    userPasswordForm.addEventListener('submit', async e => {
        e.preventDefault();
        const passwordCurrent = document.getElementById('password-current').value;
        const password = document.getElementById('password').value;
        const passwordConfirm = document.getElementById('password-confirm').value;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const res = await fetch('/api/v1/users/updateMyPassword', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ passwordCurrent, password, passwordConfirm })
            });

            const data = await res.json();

            if (data.status === 'success') {
                showAlert('success', 'Password updated successfully!');
                window.setTimeout(() => {
                    location.assign('/me');
                }, 1500);
            } else {
                showAlert('error', data.message || 'Error updating password');
            }
        } catch (err) {
            showAlert('error', 'Something went wrong!');
        }
    });
}
