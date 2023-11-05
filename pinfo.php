 <?php
class Student {
    public $name;
    public $age;
    public $maths;
    public $phisics;
    public $chamastry;
    public function __construct($name, $age, $maths, $phisics, $chamastry) {
        $this->name = $name;
        $this->age = $age;
        $this->maths = $maths;
        $this->phisics = $phisics;
        $this->chamastry = $chamastry;
    }
}
$students = [
    new Student("Олег", 20,  90,  85,  92),
    new Student("Ірина", 22,  95,  88,  90),
    new Student("Петро", 21,  87,  75,  80)
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Інформація про студентів</title>
</head>
<body>
<table>
    <tr>
        <th>Ім'я</th>
        <th>Вік</th>
        <th>Математика</th>
        <th>Фізика</th>
        <th>Хімія</th>
    </tr>
    <?php foreach ($students as $student) { ?>
        <tr>
            <td><?php echo $student->name; ?></td>
            <td><?php echo $student->age; ?></td>
            <td><?php echo $student->maths; ?></td>
            <td><?php echo $student->phisics; ?></td>
            <td><?php echo $student->chamastry; ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html> 


<!-- <--////////////////////////////////////////// -->

<?php
function addMatrices($matrixA, $matrixB) {
    $rows = count($matrixA);
    $cols = count($matrixA[0]);
    if ($rows != count($matrixB) || $cols != count($matrixB[0])) {
        return "Размеры матриц не совпадают";
    }

    $result = array();
    for ($i = 0; $i < $rows; $i++) {
        $row = array();
        for ($j = 0; $j < $cols; $j++) {
            $row[] = $matrixA[$i][$j] + $matrixB[$i][$j];
        }
        $result[] = $row;
    }
    return $result;
}
function multiplyMatrices($matrixA, $matrixB) {
    $rowsA = count($matrixA);
    $colsA = count($matrixA[0]);
    $colsB = count($matrixB[0]);
    if ($colsA != count($matrixB)) {
        return "Умножение матриц невозможно";
    }
    $result = array();
    for ($i = 0; $i < $rowsA; $i++) {
        $row = array();
        for ($j = 0; $j < $colsB; $j++) {
            $total = 0;
            for ($k = 0; $k < $colsA; $k++) {
                $total += $matrixA[$i][$k] * $matrixB[$k][$j];
            }
            $row[] = $total;
        }
        $result[] = $row;
    }
    return $result;
}
$matrixA = array(
    array(1, 2),
    array(3, 4)
);

$matrixB = array(
    array(5, 6),
    array(7, 8)
);
$additionResult = addMatrices($matrixA, $matrixB);
$multiplicationResult = multiplyMatrices($matrixA, $matrixB);
echo "<br>Матриця A:<br>";
foreach ($matrixA as $row) {
    echo implode(", ", $row) . "<br>";
}

echo "<br>Матриця B:<br>";
foreach ($matrixB as $row) {
    echo implode(", ", $row) . "<br>";
}
echo "<br><br><br>Результат додавання матриць:<br>";
foreach ($additionResult as $row) {
    echo implode(", ", $row) . "<br>";
}

echo "<br>Результат множення матриць:<br>";
foreach ($multiplicationResult as $row) {
    echo implode(", ", $row) . "<br>";
}
?>



<!-- <--////////////////////////////////////////// -->
<?php
$products = array(
    array('name' => 'Ноутбук', 'price' => 1200, 'description' => 'Потужний ноутбук з високоякісним дисплеєм.'),
    array('name' => 'Мишка', 'price' => 30, 'description' => 'Бездротова мишка.'),
    array('name' => 'Фотоапарат', 'price' => 500, 'description' => 'Дзеркальний фотоапарат з великим зумом.'),
    array('name' => 'Навушники', 'price' => 80, 'description' => 'Бездротові навушники з шумозаглушенням.'),
    array('name' => 'Клавіатура', 'price' => 40, 'description' => 'Механічна клавіатура.')
);

$filteredProducts = array_filter($products, function ($product) {
    return $product['price'] < 50;
});

echo '<h2>Продукти з ціною менше 50 доларів:</h2>';
echo '<table border="1">';
echo '<tr><th>Назва</th><th>Ціна</th><th>Опис</th></tr>';

foreach ($filteredProducts as $product) {
    echo '<tr>';
    echo '<td>' . $product['name'] . '</td>';
    echo '<td>' . $product['price'] . '</td>';
    echo '<td>' . $product['description'] . '</td>';
    echo '</tr>';
}

echo '</table>';
?>


<!-- <--////////////////////////////////////////// -->




<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <?php
    $products = [
        'Product A' => ['description' => 'Бездротова мишка', 'price' => 30],
        'Product B' => ['description' => 'Механічна клавіатура', 'price' => 40],
        'Product C' => ['description' => 'Навушники з шумозаглушенням', 'price' => 50]
    ];
    ?>
    <div id="products">
        <h2>Товари</h2>
        <?php foreach ($products as $product => $details) { ?>
            <div>
                <p>Товар: <?php echo $product; ?> (Опис: <?php echo $details['description']; ?>)</p>
                <button onclick="addToCart('<?php echo $product; ?>', <?php echo $details['price']; ?>)">Додати</button>
            </div>
        <?php } ?>
    </div>

    <div id="cart">
        <h2>Кошик</h2>
        <ul id="cart-items"></ul>
        <p>Загальна вартість: $<span id="total-price">0</span></p>
    </div>

    <script>
        let totalPrice = 0;

        function addToCart(product, price) {
            const cart = document.getElementById('cart-items');
            const newItem = document.createElement('li');
            newItem.innerHTML = `Товар: ${product} - Ціна: $${price}`;
            cart.appendChild(newItem);

            totalPrice += price;
            const totalPriceElement = document.getElementById('total-price');
            totalPriceElement.innerText = totalPrice;
        }
    </script>
</body>
</html>
 



<!-- <--////////////////////////////////////////// -->



<!DOCTYPE html>
<html>

<head>
    <title>Команди футболу</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Назва</th>
            <th>Перемоги</th>
            <th>Поразки</th>
        </tr>

        <?php
        $teams = [
            ["name" => "Динамо", "wins" => 10, "losses" => 3],
            ["name" => "Шахтар", "wins" => 9, "losses" => 2],
            ["name" => "Зоря", "wins" => 20, "losses" => 5],
            ["name" => "Ворскла", "wins" => 6, "losses" => 6],
            ["name" => "Карпати", "wins" =>11, "losses" => 10]
        ];

        // Перемішуємо масив команд у випадковому порядку
        shuffle($teams);

        // Функція для сортування масиву за кількістю перемог
        usort($teams, function ($a, $b) {
            return $b['wins'] - $a['wins'];
        });

        foreach ($teams as $team) {
            echo "<tr>";
            echo "<td>" . $team['name'] . "</td>";
            echo "<td>" . $team['wins'] . "</td>";
            echo "<td>" . $team['losses'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>

</html>




