
let ok = false;
let count = 0;
document.querySelectorAll('.login-landing .login-section form input').forEach((el) => {
	el.addEventListener('blur', (e) => {
		if (e.target.type === 'email')
			if (/[\s+<+>+&+\*+]/gi.test(e.target.value) && count === 0) {
				count++;
				createError(e, `Do not use * , & , | , or space`);
			}
			else {
				ok = true;
			}
	});
	el.addEventListener('click', (e) => {
		if (e.target.type === 'submit') {
			e.preventDefault();
			let fields = e.target.parentElement.querySelectorAll(`input:not([type="submit"])`);
			if ((fields[0].value === '' || fields[1].value === '') && count === 0) {
				count++;
				createError(e, `Fill All Fields`);
			}
		}
	});
});

function createError(e, message) {
	let error = document.createElement('div');
	error.classList.add('error-message');
	error.append(`${message}`);
	e.currentTarget.parentElement.parentElement.append(error);
	setTimeout(() => {
		error.remove();
		count = 0;
	}, 3000);
}
