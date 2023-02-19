<style>
  table {
    border-collapse: collapse;
    margin: 20px auto;
  }
  table td, table th {
    padding: 10px;
    border: 1px solid #ccc;
  }
  table th {
    background-color: #f2f2f2;
    text-align: left;
  }
  input[type="number"], input[type="submit"] {
    margin-bottom: 10px;
    padding: 5px;
  }
  label {
    display: inline-block;
    width: 100px;
    text-align: right;
    padding-right: 10px;
    margin-bottom: 10px;
  }
</style>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $buy_price = floatval($_POST['buy_price']);
  $sell_price = floatval($_POST['sell_price']);
  $shares = intval($_POST['shares']);
  $commission = floatval($_POST['commission']);

  $buy_cost = $buy_price * $shares;
  $sell_cost = $sell_price * $shares;
  $total_cost = $buy_cost + $sell_cost + $commission;

  $profit_loss = $sell_cost - $buy_cost - $commission;
  $percent_profit_loss = ($profit_loss / $buy_cost) * 100;
}
?>

<form method="post">
  <table>
    <tr>
      <td><label>Buy Price:</label></td>
      <td><input type="number" step="any" name="buy_price" required></td>
    </tr>
    <tr>
      <td><label>Sell Price:</label></td>
      <td><input type="number" step="any" name="sell_price" required></td>
    </tr>
    <tr>
      <td><label>Shares:</label></td>
      <td><input type="number" name="shares" required></td>
    </tr>
    <tr>
      <td><label>Commission:</label></td>
      <td><input type="number" step="any" name="commission" value="0"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Calculate"></td>
    </tr>
  </table>
</form>

<?php if($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
  <table>
    <tr>
      <th>Results:</th>
    </tr>
    <tr>
      <td>Buy Cost:</td>
      <td><?= number_format($buy_cost, 2) ?></td>
    </tr>
    <tr>
      <td>Sell Cost:</td>
      <td><?= number_format($sell_cost, 2) ?></td>
    </tr>
    <tr>
      <td>Total Cost:</td>
      <td><?= number_format($total_cost, 2) ?></td>
    </tr>
    <tr>
      <td>Profit/Loss:</td>
      <td><?= number_format($profit_loss, 2) ?></td>
    </tr>
    <tr>
      <td>Percent Profit/Loss:</td>
      <td><?= number_format($percent_profit_loss, 2) ?>%</td>
    </tr>
  </table>
<?php } ?>
