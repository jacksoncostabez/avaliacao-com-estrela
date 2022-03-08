<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <title>Star - Avaliação</title>
</head>

{{-- https://rateyo.fundoocode.ninja/ --}}

<body>
    <h1>Avalie</h1>

    <div class="container">
        <div class="row">
            <form action="{{ route('star.store') }}" method="post" id="target">
                @csrf
                <div>
                    <h1>Avaliação</h1>
                </div>

                <div>
                    <label for="">Nome</label>
                    <input type="text" name="name" id="">
                </div>

                <div class="rateyo" id="rating" data-rateyo-rating="{{$avg > 0 ? $avg : 3 }}" data-rateyo-num-stars="5" data-rateyo-score="3"></div>

                <span class="result">0</span>
                <input type="hidden" name="rating" value="">

                <div>
                    <input type="submit" value="Avaliar">
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>

        $(function () {
            $("#rating").rateYo({
            starWidth: "25px"
            });
        });

        $(function() {
            $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score: '+$(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating: '+rating);
                $(this).parent().find('input[name=rating]').val(rating);
            });
        });

        $("#rating").click(function() {
            $("#target").submit();
        });

    </script>

</body>
</html>