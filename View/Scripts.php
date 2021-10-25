<script>
var books = <?php echo json_encode($books); ?>;
var writers = <?php echo json_encode($writers); ?>;


$(function(){
    $('#book').change(function(){
        $("#book_writers").html(' ');
        if ($('#book option:selected').hasClass("1")) {
            $("#book_writers").html(books[0]['writer_name']);
        } else if ($("#book option:selected").hasClass("2")) {
            $("#book_writers").html(books[1]['writer_name']);
        } else if ($('#book option:selected').hasClass("3")) {
            $("#book_writers").html(books[2]['writer_name']);
        } else if ($('#book option:selected').hasClass("4")) {
            $("#book_writers").html(books[3]['writer_name']);
        } else if ($('#book option:selected').hasClass("5")) {
            $("#book_writers").html(books[4]['writer_name']);
        }
    });

    $('#writer').change(function(){
        $("#sum").html(' ');
        if ($('#writer option:selected').hasClass("1")) {
            var sum = 0;
            for (var i = books.length - 1; i >= 0; i--) {
                $.each(books[i]['writer_id'], function (index, value){
                  if (value == 1) {
                    sum = sum + Number.parseInt(books[i]['price']);
                  }
                });
            }
            $("#sum").html(sum + ' руб.');
        } else if ($("#writer option:selected").hasClass("2")) {
            var sum = 0;
            for (var i = books.length - 1; i >= 0; i--) {
                $.each(books[i]['writer_id'], function (index, value){
                  if (value == 2) {
                    sum = sum + Number.parseInt(books[i]['price']);
                  }
                });
            }
            $("#sum").html(sum + ' руб.');
        } else if ($('#writer option:selected').hasClass("3")) {
            var sum = 0;
            for (var i = books.length - 1; i >= 0; i--) {
                $.each(books[i]['writer_id'], function (index, value){
                  if (value == 3) {
                    sum = sum + Number.parseInt(books[i]['price']);
                  }
                });
            }
            $("#sum").html(sum + ' руб.');
        }
    });

    var withoutWriters = '';
    for (var i = books.length - 1; i >= 0; i--) {
        $.each(books[i]['writer_id'], function (index, value){
            if (value == null) {
                withoutWriters = withoutWriters + ' ' + books[i]['book_name'];
            }
        });
    }
    $("#withoutWriters").html(withoutWriters);
});


</script>