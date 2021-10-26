<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ReadIt! - catalog</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-danger box-shadow mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}"><img width="100" src="logo.jpg"/></a>
            <a class="navbar-brand" href="{{url('/')}}">Home</a>
            <a class="navbar-brand" href="{{'weather'}}">Weather</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>
<div class="container">
    <main role="main" class="pb-3">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <img width="40" src="cart.jpg"/>
            <div class="text-center">

                <h1 class="display-5">Our Books:</h1>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Pages</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    @php
                        $books = [
                            ['Name' => "Rama II", 'Author' => "Arthur C. Clark", 'Pages' => 281,'ImageUrl' => "rama.jpg", 'InStock' => 54, 'Price' => 44.23],
                            ['Name' => "Exhalation", 'Author' => "Ted Chiang", 'Pages' => 556,'ImageUrl' => "exhalation.jpg", 'InStock' => 13, 'Price' => 50.99 ],
                            ['Name' => "Traffic Secrets", 'Author' => "Russell Brunson", 'Pages' => 306,'ImageUrl' => "traffic.jpg", 'InStock' => 65, 'Price' => 18.97 ],
                            ['Name' => "Clean Code", 'Author' => "Robert Martin", 'Pages' => 464,'ImageUrl' => "clean.jpg", 'InStock' => 15, 'Price' => 87.00 ]
                        ];
                    @endphp
                    @foreach ($books as $index => $book)
                        <tr>
                            <td>
                                {{$book['Name']}}
                            </td>
                            <td>
                                {{$book['Author']}}
                            </td>
                            <td>
                                {{$book['Pages']}}
                            </td>
                            <td>
                                {{$book['Price']}}
                            </td>
                            <td>
                                @if ($book['InStock']<=0)
                                    <p>Out of stock :-(</p>
                                    }
                                @else
                                    <form onclick="addToShoppingCart" method="post">
                                        <input type="hidden" name="bookId" value="{{$index + 1}}"/>
                                        <button>Add to shopping cart</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                <form asp-page-handler="load" method="post">
                    <button>Load Books to DB</button>
                </form>
            </div>
    </main>
</div>

<footer class="border-top footer text-muted">
    <div class="container">
        &copy; 2020 - ReadIt!
    </div>
</footer>
</body>
</html>
