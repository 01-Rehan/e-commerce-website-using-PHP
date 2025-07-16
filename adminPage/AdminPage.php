<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: white;
        padding: 15px;
        text-align: center;
    }

    .container {
        max-width: 1000px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-bottom: 20px;
    }

    form {
        margin-bottom: 30px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input,
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f8f8f8;
    }

    .action-icons i {
        margin-right: 10px;
        cursor: pointer;
    }

    .action-icons i.edit {
        color: #007bff;
    }

    .action-icons i.delete {
        color: red;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        appearance: none;
    }
    </style>
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <div class="container">
        <h2>Add New Product</h2>
        <form action="./adminBackend/additem.php" method="POST">
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" required>

            <label for="price">Price</label>
            <input type="number" step="1" id="price" name="price" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4"></textarea>

            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="">-- Select Category --</option>
                <option value="Cloths">Cloths</option>
                <option value="Tracksuit">Tracksuit</option>
                <option value="T-shirts">T-shirts</option>
                <option value="Shorts">Shorts</option>
                <option value="Sweatshirts">Sweatshirts</option>
                <option value="Jacket">Jacket</option>
                <option value="Compression Clothing">Compression Clothing</option>
                <option value="Track Pants">Track Pants</option>

                <option value="Fitness">Fitness</option>
                <option value="Cardio & Gym">Cardio & Gym</option>
                <option value="Gym Accessories">Gym Accessories</option>
                <option value="Strength Training">Strength Training</option>
                <option value="Aerobics & Agility">Aerobics & Agility</option>
                <option value="Abs & Core">Abs & Core</option>
                <option value="Swimming">Swimming</option>

                <option value="Racket Sports">Racket Sports</option>
                <option value="Badminton">Badminton</option>
                <option value="Tennis">Tennis</option>
                <option value="Table Tennis">Table Tennis</option>
                <option value="Squash">Squash</option>

                <option value="Team Sports">Team Sports</option>
                <option value="Cricket">Cricket</option>
                <option value="Football">Football</option>
                <option value="Basketball">Basketball</option>
                <option value="Kits">Kits</option>

                <option value="Shoes - Men">Shoes - Men</option>
                <option value="Shoes - Women">Shoes - Women</option>
                <option value="Shoes - Other">Shoes - Other</option>

                <option value="Yoga">Yoga</option>
                <option value="Cardio Equipments">Cardio Equipments</option>
                <option value="Safety Equipments">Safety Equipments</option>
                <option value="Racing Equipments">Racing Equipments</option>
                <option value="Baseball Equipments">Baseball Equipments</option>
                <option value="Sporty Cloth">Sporty Cloth</option>
                <option value="Chess">Chess</option>
                <option value="Carrom Boards">Carrom Boards</option>
                <option value="Hockey">Hockey</option>
            </select>
            <label for="image">Image File Path</label>
            <input type="text" id="image" name="image">

            <button type="submit">Add Product</button>
            <button onclick="window.location.href='../index.php'" style="background:#007bff;color:#fff;padding:10px 20px;border:none;border-radius:4px;cursor:pointer;margin-bottom:20px;">
                      Go to Home
            </button> NOTE* : you will have to relogin in-order to come back to Admin Dashboard 
        </form>


        <h2>Existing Products</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                </tr><?php
                $connection = mysqli_connect("localhost", "root", "", "sports_store_sem2");
                if ($connection) {
                    $printQuery = "SELECT * FROM product";
                    $result = mysqli_query($connection, $printQuery);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['category']}</td>
                                <td class='action-icons'>
                                  <a href='./adminBackend/delete_product.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this product?')\">
                                      <i class='fas fa-trash delete' title='Delete'></i>
                                  </a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No products found.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Database connection failed.</td></tr>";
                }
?>
            </tbody>
        </table>
    </div>
</body>

</html>