<?php

$Vo = !empty($_POST['V0']) ? intval($_POST['V0']) : 0;
$D = !empty($_POST['D']) ? intval($_POST['D']) : 0;

$result = '';

if (!empty($_POST['calculate']) && $Vo > 0 && $D > 0) {
  $Vo = $Vo / 3.6;
  $result = "V² = V₀² + 2.a.Δs\n";
  $result .= "0² = $Vo ² - 2.$D.Δs\n";
  $result .= "0 = " . ($Vo * $Vo) . " - " . (2 * $D) . ".Δs\n";
  $result .= "Δs = " . ($Vo * $Vo) . " / " . (2 * $D) . "\n";
  $result .= "---------------------------\n";
  $result .= "Δs = " . number_format((($Vo * $Vo) / (2 * $D)), 1) . "m\n";
}

if (!empty($_POST['clear'])) {
  $Vo = '0';
  $D = '0';
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
  <span class="p-2 border rounded fs-2">V² = V₀² + 2.a.Δs</span>
</div>

<span class="mb-2 text-secondary">Enter the values for the calculation</span>
<form class="d-flex flex-column justify-content-center align-items-center w-50 gap-3 mb-3" method="post">

  <div class="input-group has-validation">
    <span class="input-group-text rounded-0 rounded-start">Start speed (km/h)</span>
    <input type="number" value=0 value=<?= $Vo ?> class="form-control rounded-0" id="V0" name="V0">
    <span class="input-group-text rounded-0">Decelerate (m/s)²</span>
    <input type="number" value=0 value=<?= $D ?> class="form-control rounded-0 rounded-end" id="D" name="D">
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