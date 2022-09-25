let progrButn = document.getElementById("progrButn")

if (!localStorage.theme) localStorage.theme = "light"
document.body.className = localStorage.theme
progrButn.innerText = document.body.classList.contains("dark") ? "Смени на светлую" : "Сменить на темную?"

progrButn.onclick = () => {
  document.body.classList.toggle("dark")
  progrButn.innerText = document.body.classList.contains("dark") ? "Смени на светлую" : "Сменить на темную?"
  localStorage.theme = document.body.className || "light"
}

// function show(state)
// {
//   document.getElementById('window').style.display = state;
//   document.getElementById('backG').style.display = state;
// }


"use strict"
document.addEventListener('DOMContentLoaded', function() {

  const form = document.getElementById("form_id");
  
  let isValidate = false;

  const pass1 = form.querySelector('.pasw1');
  const pass2 = form.querySelector('.pasw2');

  const regExpPasw = 
  /^(?=.*[A-Z])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{6,}$/
  const regExpEmail = 
  /[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/igm
  const regExpTele =
  /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/
  const regExpUser = 
  /^[a-z0-9_-]{3,30}$/
  var regExpRusUser =
  /[а-яА-ЯЁё-і]/g;
  var upperCasePasw = 
  /[A-Z]/g;
  var numberPasw =
  /[0-9]{3}/g;
  var lowerCasePasw =
  /[a-z]{3}/g;

  // const submit = () => {
    
  // }

  // const MaskPhone = function() {
  //   const inputsPhone = document.querySelectorAll('input[name="phoneN"]');

  //   inputsPhone.forEach((input) => {
  //     let keyCode;

  //     const mask = (event) => {
  //       event.keyCode && (keyCode = event.keyCode);
  //       let pos = input.selectionStart;

  //       if (pos < 3) {
  //         event.preventDefault();
  //       }

  //       let matrix = "+7 (___) ___ __ __",
  //         i=0,
  //         def = matrix.replace(/\D/g, ""),
  //         val = input.value.replace(/\D/g, ""),
  //         newValue = matrix.replace(/[_\d]/g, (a) => {
  //           if (i < val.length) {
  //             return val.charAt(i++) || def.charAt(i);
  //           } else {
  //             return a;
  //           }
  //         });
      
  //     i = newValue.indexOf("_");

  //     if (i != -1) {
  //       i < 5 && (i=3);
  //       newValue = newValue.slice(0, i);
  //     }
      
  //     let reg = matrix 
  //       .substr(0, input.value.length)
  //       .replace(/_+/g, (a) => {
  //         return "\\d{1," + a.length + "}";
  //       })
  //       .replace(/[+()]/g, "\\$&");
  //     reg = new RegExp("^" + reg + "$");
  //     if (
  //       !reg.test(input.value) ||
  //       input.value.length < 5 ||
  //       (keyCode > 47 && keyCode < 58)
  //     ) {
  //       input.value = newValue;
  //     }
      
  //     if (event.type === "blur" && input.value.length < 5) {
  //       input.value = "";
  //     }

  //     };
    
  //   input.addEventListener("input", mask, false);
  //   input.addEventListener("focus", mask, false);
  //   input.addEventListener("blur", mask, false);
  //   input.addEventListener("keydown", mask, false);
    
  //   });
  // }

  // MaskPhone();

  const validateElem = function(elem) {
    
    if (elem.name === 'login'){
      if(!regExpUser.test(elem.value) && elem.value != '') {
        elem.nextElementSibling.textContent = 'Имя пользователя введено некорректно.';
        isValidate = false;

        if (elem.value.match(regExpRusUser)) {
          elem.nextElementSibling.textContent = 'Логин должен состоять из латинских символов.';
          isValidate = false;
        }
        if (elem.value.length > 30) {
          elem.nextElementSibling.textContent = 'Слишком большой логин.';
          isValidate = false;
        }
        if (elem.value.length < 3) {
          elem.nextElementSibling.textContent = 'Меньше 3 символов? Такого не должно быть.';
          isValidate = false;
        }
      } else {
        elem.nextElementSibling.textContent = '';
        isValidate = true;
      }
    
    
    }
  
    if (elem.name === 'pasw1'){
      if (pass1.value != pass2.value && pass2.value != '') {
        pass1.nextElementSibling.textContent = 'Пароли не совпадают!';
        pass2.nextElementSibling.textContent = 'Пароли не совпадают!';
        isValidate = false;
      } else {
        pass1.nextElementSibling.textContent = '';
        pass2.nextElementSibling.textContent = '';
        isValidate = true;
      }


    }


    if (elem.name === 'pasw1'){   
      if (pass1.value != pass2.value && pass2.value != '') {
        elem.nextElementSibling.textContent = 'Пароли не совпадают!';
        isValidate = false;
      } else {
        elem.nextElementSibling.textContent = '';
        isValidate = true;
      }
      
      if(!regExpPasw.test(elem.value) && elem.value != '') {
        elem.nextElementSibling.textContent = 'Пароль введен некорректно.';
        isValidate = false;
      
      if (!elem.value.match(upperCasePasw)) {
        elem.nextElementSibling.textContent = 'Добавьте верхний регист к вашему паролю.';
        isValidate = false;
      }

      if (!elem.value.match(numberPasw)) {
        elem.nextElementSibling.textContent = 'Пароль должен содержать минимум 3 цифры.';
        isValidate = false;
      }

      if (!elem.value.match(lowerCasePasw)) {
        elem.nextElementSibling.textContent = 'Пароль должен содержать минимум 3 нижних регистра.';
        isValidate = false;
      }



      if (elem.value.match(regExpRusUser)) {
        elem.nextElementSibling.textContent = 'Пароль не должен содержать русские символы.';
        isValidate = false;
      }

      } else {
        elem.nextElementSibling.textContent = '';
        isValidate = true;
    }  
}

    if (elem.name === 'pasw2'){
      if (pass1.value != pass2.value && pass2.value != '') {
        pass1.nextElementSibling.textContent = 'Пароли не совпадают!';
        pass2.nextElementSibling.textContent = 'Пароли не совпадают!';
        isValidate = false;
      } else {
        pass1.nextElementSibling.textContent = '';
        pass2.nextElementSibling.textContent = '';
        isValidate = true;
      }
    } 

    if (elem.name == 'phoneN') {
      if(!regExpTele.test(elem.value) && elem.value != '') {
        elem.nextElementSibling.textContent = 'Номер введен некорректно. Попробуйте еще раз!';
        isValidate = false;
      } else {
        elem.nextElementSibling.textContent = '';
        isValidate = true;
      }
    }

    
    if (elem.name === 'email'){
      if(!regExpEmail.test(elem.value) && elem.value != '') {
        elem.nextElementSibling.textContent = 'Введите корректный e-mail.';
        isValidate = false;
      } else {
        elem.nextElementSibling.textContent = '';
        isValidate = true;
      }
    }
  
    if (elem.name === 'phoneN'){
    }
  
  }

  for(let elem of form_id.elements) {
    if(
      elem.classList.contains('input') &&
      elem.tagName != 'BUTTON') 
      {
        elem.addEventListener('blur', function() {
            validateElem(elem);
        });
      }
  }

  form.addEventListener('submit', formSend);
  async function formSend(e) {
    
    
    let formData = new FormData(form);

    if (isValidate) {
      let response = await fetch('validation/save_user.php', {
        method:  'POST',
        body: formData,
      });
    }

    for(let elem of form_id.elements) {
      if(
        elem.classList.contains('input') &&
        elem.tagName != 'BUTTON') 
        {
         if(elem.value === "") {
          elem.nextElementSibling.textContent = 'Данное поле должно быть заполнено'
          isValidate = false;
         }  else {
          elem.nextElementSibling.textContent = ''
          isValidate = true;
         }
        }
    }
  }


});

// "use strict"
// document.addEventListener('DOMContentLoaded', function() {

//   const form = document.getElementById("form_id");
//   form.addEventListener('submit', formSend);

//   async function formSend(e) {
//     e.preventDefault();  
//     let error = formValidate(form);

//     let formData = new FormData(form);


//     if (error === 0) {
//       form.classList.add('_sending');

//       let response = await fetch('validation/save_user.php', {
//         method: 'POST',
//         body: formData
//       });

//       if (response.ok) {
//         let result = await response.json();
//         alert(result.message);
//         form.reset();
//         form.classList.remove('_sending');
//         location.reload();
//         return false;
//       } else {
//         alert('Ошибка');
//         form.classList.add('_sending');
//       }

//     } else {
      
//     }

//   }

//   function formValidate(form) {
//     let error = 0;
//     let formReq = document.querySelectorAll('._req');

//     for (let index = 0; index < formReq.length; index++){
//       const input = formReq[index];
      

//     formRemoveError(input);

//       if(input.classList.contains('_email')){
//         if(emailTest(input)) {
//           formAddError(input);
//           error++;
//         }
      
//       } else if(input.getAttribute('type') === 'checkbox' && input.checked === false) {
//         formAddError(input);
//         error++;
      
//       } else {
//         if (input.value === '') {
//           formAddError(input);
//           error++;
//         }
//       } 
//     } 
//     return error;
//   }


//   function formAddError(input) {
//     input.parentElement.classList.add('_error');
//     input.classList.add('_error');
//   }

//   function formRemoveError(input) {
//     input.parentElement.classList.remove('_error');
//     input.classList.remove('_error');
//   }

//   function emailTest(input) {
//     return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
//   }
// });




// formData.append('image', formImage.files[0]); будущая добавка изображения при входе

// для будущей менюшки ВОЙТИ и выше тоже

// const formImage = document.getElementById('formImage');
// const formPreview = document.getElementById('formPreview');

// formImage.addEventListener('change', () => {
//   uploadFile(formImage.files[0]);
// });


// function uploadFile(file) {
//   if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
//     alert('Разрешены только изображения и gif-анимация.');
//     formImage.value = '';
//     return;
//   }
//   if (file.size > 2 * 1024 *1024) {
//     alert('Файл не должен быть менее 2МБ.');
//     return;
//   }

//   var reader = new FileReader();
//   reader.onload = function (e) {
//     formPreview.innerHTML = '<img src="${e.target.result}" alt="Фото">';
//   };

//   reader.onerror = function (e) {
//     alert('Ошибка');
//   };

//   reader.readAsDataURL(file);
// }

// formPreview.innerHTML = '';




// $(document).ready(function() {
//   let position = 0;
//   const slidesToShow = 7;
//   const slidesToScroll = 6;
//   const container = $('.slider__container');
//   const track = $('.slider__track');
//   const item = $('.slider__item');
//   const btnPrev = $('.btn__prev');
//   const btnNext = $('.btn__next');
//   const itemsCount = item.length;
//   const itemWidth = container.width() / slidesToShow;
//   const movePosition = slidesToScroll * itemWidth;

//   item.each(function (index, item) {
//     $(item).css({
//       minWidth: itemWidth,
//     });
//   });
  

//   btnNext.click(function () {
//     const itemsLeft = itemsCount - 
//     (Math.abs(position) + 
//     slidesToShow * itemWidth) / itemWidth;

//     position -= itemsLeft >= slidesToScroll ? 
//     movePosition : itemsLeft * itemWidth;

//     setPosition();
//     checkBtns();
// });

//   btnPrev.click(function () {
//     const itemsLeft = Math.abs(position) / itemWidth;
    
//     position += itemsLeft >= slidesToScroll ? 
//     movePosition : itemsLeft * itemWidth;

//     // position += movePosition;

//     setPosition();
//     checkBtns();
// });

//   const setPosition = () => {
//     track.css({
//       transform: `translateX(${position}px)`
//       });
//   };


//   const checkBtns = () => {
//     btnNext.prop(
//       'disabled', 
//       position <= -(itemsCount - slidesToShow) * itemWidth);
//     btnPrev.prop('disabled', position === 0);
//   };


//   checkBtns();

// });


// $(document).ready(function() {
//   $(".count_likes").bind("click", function() {
//       var link = $(this);
//       var id = link.data('id');
//       $.ajax({
//           url: "/films.php",
//           type: "POST",
//           data: {id:id}, // Передаем ID нашей статьи
//           dataType: "json",
//           success: function(result) {
//               if (!result.error){ //если на сервере не произойло ошибки то обновляем количество лайков на странице
//                   link.addClass('active'); // помечаем лайк как "понравившийся"
//                   $('.counter',link).html(result.count);
//               }else{
//                   alert(result.message);
//               }
//           }
//       });
//   });
// });


$(document).ready(function() {
 
  // Обработчик события keyup, сработает после того как пользователь отпустит кнопку, после ввода чего-либо в поле поиска.
  // Поле поиска из файла 'index.php' имеет id='search'
  $("#search").keyup(function() {

      // Присваиваем значение из поля поиска, переменной 'name'.
      var name = $('#search').val();

      // Проверяем если значение переменной 'name' является пустым
      if (name === "") {

          // Если переменная 'name' имеет пустое значение, то очищаем блок div с id = 'display'
          $("#display").html("");

      }
      else {
          // Иначе, если переменная 'name' не пустая, то вызываем ajax функцию.

          $.ajax({

              type: "POST", // Указываем что будем обращатся к серверу через метод 'POST'
              url: "next1.php", // Указываем путь к обработчику. То есть указывем куда будем отправлять данные на сервере.
              data: {
                  // В этом объекте, добавляем данные, которые хотим отправить на сервер
                  search: name // Присваиваем значение переменной 'name', свойству 'search'.
              },
              success: function(response) {
                  // Если ajax запрос выполнен успешно, то, добавляем результат внутри div, у которого id = 'display'.
                  $("#display").html(response).show();
              }

          });

      }

  });

});

function fill(Value) {
  // Функция 'fill', является обработчиком события 'click'.
  // Она вызывается, когда пользователь кликает по элементу из результата поиска.

  $('#search').val(Value); // Берем значение элемента из результата поиска и добавляем его в значение поля поиска

  $('#display').hide(); // Скрываем результаты поиска

}



$('#body__form div').each(function() {
  $(this).parent()[Math.random() > 0.5 ? 'parent' : 'append']($(this).show())});


