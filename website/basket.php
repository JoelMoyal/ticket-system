<?php
    $cart = array();
    $cart[] = array(
        'id' => 1,
        'name' => 'Product 1',
        'price' => 10.00,
        'quantity' => 1
    );
    $cart[] = array(
        'id' => 2,
        'name' => 'Product 2',
        'price' => 20.00,
        'quantity' => 2
    );
?>

<h1>Shopping Cart</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart as $item):?>
            <tr>
                <td><?php echo $item['id'];?></td>
                <td><?php echo $item['name'];?></td>
                <td>$<?php echo number_format($item['price'], 2);?></td>
                <td><?php echo $item['quantity'];?></td>
                <td>$<?php echo number_format($item['price'] * $item['quantity'], 2);?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>