function sendEmail() {
	Email.send({
	Host: "smtp.gmail.com",
	Username : "kazukunsc2@gmail.com",
	Password : "Yokazukun23",
	To : 'kazukunsc2@gmail.com',
	From : "pro.arantxa.ordoyo@gmail.com",
	Subject : "PRUEBA",
	Body : "CUAL ES TU CALLE ?",
	}).then(
		message => alert("mail sent successfully")
	);
}