<?php

$N = !empty($_POST['limitN']) ? intval($_POST['limitN']) : 0;
$F = !empty($_POST['valueF']) ? $_POST['valueF'] : 0;

$result = '';

if (!empty($_POST['calculate']) && $N > 0) {

  $a1 = 1;
  $a2 = 1;
  $a3 = 0;

  $result .= "$a1 ➩ $a2";

  for ($i = 3; $i <= $N; $i++) {
    $a3 = $a1 + $a2;
    $result .= " ➩ $a3 ";
    $a2 = $a1;
    $a1 = $a3;
  }

  $F = $a3;
}

if (!empty($_POST['clear'])) {
  $N = '0';
  $F = '0';
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

    .input-group {
      display: flex !important;
      flex-direction: column !important;
    }

    .input-group span,
    .input-group input {
      border-radius: 0 !important;
      margin: 0 !important;
      text-align: center !important;
    }

    input[type='number'] {
      width: auto !important;
    }
  }
</style>

<div class="text-center align-middle mb-5">
  <span class="p-2 border rounded fs-2">Fn = fn-1 + Fn-2</span>
</div>

<span class="mb-2 text-secondary">Enter the values for the calculation</span>
<form class="d-flex flex-column justify-content-center align-items-center w-50 gap-3 mb-3" method="post">

  <div class="input-group has-validation">
    <span class="input-group-text rounded-0 rounded-start">The value</span>
    <input type="number" min=0 value=<?= $N ?> class="form-control" id="limitN" name="limitN">
    <span class="input-group-text rounded-0">Is equal to</span>
    <input type="number" placeholder="-" class="form-control rounded-0" id="valueF" name="valueF" value=<?= $F ?> readonly>
    <span class="input-group-text rounded-0 rounded-end">In the Fibonacci sequence</span>
  </div>

  <div class="d-flex flex-row gap-3">
    <button type="submit" class="btn btn-secondary mb-3 rounded-1" name="clear" value="true">Clear</button>
    <button type="submit" class="btn btn-primary mb-3 rounded-1" name="calculate" value="true">Calculate</button>
    <button type="button" class="btn btn-secondary mb-3 rounded-1" onclick="copy()">Copy</button>
  </div>

</form>

<div class="form-floating w-50">
  <textarea class="form-control text-center" id="result" readonly> <?= $result ?></textarea>
  <label for="result">Resolution:</label>
</div>

<script>
  const result = document.getElementById('result');

  const copy = () => {
    if (result.innerHTML.trim() == '') return;

    result.select()
    result.setSelectionRange(0, 99999) /* For mobile devices */
    navigator.clipboard.writeText(result.value)
    alert('copied!')
  }
</script>