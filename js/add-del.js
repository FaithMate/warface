$(document).ready(function() {
    // Функція для видалення
    window.confirmDelete = function(id) {
    if (confirm('Подтвердите удаление')) {
        $.ajax({
            url: './components/php-back/delete_card.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.success) {
                    window.location.reload();
                    console.log('Карта успешно удалена');
                } else {
                    alert('Error: ' + res.message);
                }
            },
            error: function() {
                alert('Error in request');
            }
        });
    }
};

    // Відкриття модального вікна для редагування
    window.editCard = function(id) {
        $('#editId').val(id);
        $('#editModal').css('display', 'flex');
        $('body').css('overflow', 'hidden');
    };

    // Обробка відправлення форми редагування
    $('#editForm').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: './components/php-back/edit_card.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('Card updated:', response);
                $('#editModal').hide();
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // Обробка помилки
            }
        });
    });

    // Закриття модального вікна
    $('.close').click(function() {
        $('#editModal').hide();
        $('body').css('overflow', 'auto');
    });
});
$(document).ready(function() {
    $('.add-cart-btn').on('click', function() {
        $('.add-cart-modal').css('display', 'flex');
        $('body').css('overflow', 'hidden');
    });

    $('.close-add-modal').on('click', function() {
        $('.add-cart-modal').css('display', 'none');
        $('body').css('overflow', 'auto');
    });
});
$(document).ready(function() {
    $('.creat-course').on('submit', function(e) {
        e.preventDefault(); // Зупиняємо стандартну відправку форми

        var formData = new FormData(this); // Створюємо новий об'єкт FormData

        $.ajax({
            url: '../components/php-back/add_course.php', // URL скрипта на сервері, куди відправляємо дані
            type: 'POST', // Метод відправки
            data: formData, // Дані форми
            processData: false, // Вказуємо jQuery не обробляти дані
            contentType: false, // Вказуємо jQuery не встановлювати тип вмісту
            success: function(response) {
                alert('Курс успешно добавлен!'); // Повідомлення про успішне додавання
            },
            error: function(xhr, status, error) {
                alert('Возникла ошибка: ' + error); // Повідомлення про помилку
            }
        });
    });
});