function validateForm() {
    var fullName = document.getElementById('fullName').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;

    // Валидация ФИО - должны быть указаны полностью фамилия, имя и отчество
    if (!fullName.match(/^[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+$/)) {
      alert('Пожалуйста, введите полное имя (фамилия, имя и отчество) на русском языке.');
      return false;
    }

    // Валидация телефона - только цифры, длина 11 символов, первые два символа +7
    if (!phone.match(/^\+7[0-9]{10}$/)) {
      alert('Пожалуйста, введите корректный номер телефона в формате +7XXXXXXXXXX.');
      return false;
    }

    // Валидация адреса электронной почты
    if (!email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
      alert('Пожалуйста, введите корректный адрес электронной почты.');
      return false;
    }
    
    return true; // Если все проверки успешны, разрешить отправку формы
  }

