<?php

$A = !empty($_POST['valueA']) ? intval($_POST['valueA']) : 0;
$B = !empty($_POST['valueB']) ? intval($_POST['valueB']) : 0;
$C = !empty($_POST['valueC']) ? intval($_POST['valueC']) : 0;

$result = '';

if (!empty($_POST['calculate']) && $A > 0) {

  $delta = $B * $B - 4 * $A * $C;
  $x1 = (-$B + sqrt($delta)) / (2 * $A);
  $x2 = (-$B - sqrt($delta)) / (2 * $A);

  $result .= "Δ = b² - 4.a.c\n";
  $result .= "Δ = $B ² - 4.$A.$C\n";
  $result .= "Δ = " . ($B * $B) . " - " . (4 * $A * $C) . "\n";
  $result .= "Δ = " . $delta . "\n\n";
  $result .= "-------------------------\n\n";
  if ($delta <= 0) {
    $result .= "The delta is negative or equal to zero and has no real roots\n";
  } else {
    $result .= "X = (-b ± √Δ) / 2.a\n";
    $result .= "X = (-$B ± √$delta) / 2.$A.\n";
    $result .= "X¹ = (" . (-$B + sqrt($delta)) . " / " . (2 * $A) . "\n";
    $result .= "X¹ = " . (-$B + sqrt($delta)) . " / " . (2 * $A) . "\n";
    $result .= "X¹ = " . number_format($x1, 1) . "\n\n";
    $result .= "-------------------------\n\n";
    $result .= "X² = (-$B - " . sqrt($delta) . " / " . (2 * $A) . "\n";
    $result .= "X² = " . (-$B - sqrt($delta)) . " / " . (2 * $A) . "\n";
    $result .= "X² = " . number_format($x2, 1) . "\n\n";
    $result .= "-------------------------\n\n";
    $result .= "Final result: (X¹ = " . number_format($x1, 1) . ",  X²=" . number_format($x2, 1) . ")";
  }
}

if (!empty($_POST['clear'])) {
  $A = '0';
  $B = '0';
  $C = '0';
  $result = '';
}

?>

<style>
  .form-control {
    box-shadow: none !important;
  }

  #result {
    min-height: 180px;
    max-height: 180px;
    overflow: auto;
  }

  @media (max-width: 600px) {
    .w-50 {
      width: 75% !important;
    }

    .input-group span,
    .input-group input {
      border-radius: 0 !important;
      margin: 0 !important;
      text-align: center !important;
      width: 100% !important;
    }
  }
</style>

<div class="text-center align-middle mb-5">
  <span class="p-2 border rounded fs-2">Δ = b² - 4.a.c</span>
</div>

<span class="mb-2 text-secondary">Enter the values for the calculation</span>
<form class="d-flex flex-column justify-content-center align-items-center w-50 gap-3 mb-3" method="post">

  <div class="input-group has-validation">
    <span class="input-group-text rounded-0 rounded-start">Value A</span>
    <input type="number" value=<?= $A ?> class="form-control rounded-0" id="valueA" name="valueA">
    <span class="input-group-text rounded-0">Value B</span>
    <input type="number" value=<?= $B ?> class="form-control rounded-0" id="valueB" name="valueB">
    <span class="input-group-text rounded-0">Value C</span>
    <input type="number" value=<?= $C ?> class="form-control rounded-0 rounded-end" id="valueC" name="valueC">
  </div>

  <div class="d-flex flex-row gap-3">
    <button type="submit" class="btn btn-secondary mb-3 rounded-1" name="clear" value="true">Clear</button>
    <button type="submit" class="btn btn-primary mb-3 rounded-1" name="calculate" value="true">Calculate</button>
    <button type="button" class="btn btn-secondary mb-3 rounded-1" onclick="copy()">Copy</button>
  </div>

</form>

<div class="form-floating w-50">
  <textarea class="form-control text-center" id="result" readonly><?= $result ?></textarea>
  <label for="result">Resolution:</label>
</div>

<script>
  const result = document.getElementById('result');

  const copy = () => {
    if (result.innerHTML.trim() == '') return;

    result.select();
    result.setSelectionRange(0, 99999); /* For mobile devices */
    navigator.clipboard.writeText(result.value);
    alert('copied!');
  }
</script>