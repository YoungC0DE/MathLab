<style>
  .form-control {
    box-shadow: none !important;
  }

  #result {
    min-height: 180px;
    max-height: 180px;
    overflow: auto;
  }
  @media (max-width: 600px){
    .w-50 {
      width: 75% !important;
    }
    .input-group {
      display: flex !important;
      flex-direction: column !important;
    }

    .input-group span, .input-group input {
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
<form class="d-flex flex-row w-50 gap-3 mb-3">
  <div class="input-group has-validation">
    <span class="input-group-text rounded-0 rounded-start">Start speed (km/h)</span>
    <input type="number" value=0 min=0 class="form-control rounded-0" id="V0">
    <span class="input-group-text rounded-0">Decelerate (m/s)²</span>
    <input type="number" value=0 min=0 class="form-control rounded-0 rounded-end" id="D">
  </div>
</form>

<div class="d-flex flex-row gap-3">
  <button type="button" class="btn btn-secondary mb-3 rounded-1" onclick="clean()">Clear</button>
  <button type="button" class="btn btn-primary mb-3 rounded-1" onclick="calc()">Calculate</button>
  <button type="button" class="btn btn-secondary mb-3 rounded-1" onclick="copy()">Copy</button>
</div>

<div class="form-floating w-50">
  <textarea class="form-control text-center" id="result" readonly></textarea>
  <label for="result">Resolution:</label>
</div>

<script>
  const result = document.getElementById('result')

  const clean = () => {
    result.textContent = ''
  }

  const calc = () => {
    let V0 = parseInt(document.getElementById('V0').value),
      D = parseInt(document.getElementById('D').value)

    V0 = V0 / 3.6
    result.textContent = "V² = V₀² + 2.a.Δs\n"
    result.textContent += `0² = ${V0}² - 2.${D}.Δs\n`
    result.textContent += `0 = ${V0 * V0} - ${2*D}.Δs\n`
    result.textContent += `Δs = ${V0 * V0} / ${2*D}\n`
    result.textContent += "---------------------------\n"
    result.textContent += `Δs = ${(V0 * V0 / 2*D).toFixed(1)}m\n`
  }

  const copy = () => {
    result.select()
    result.setSelectionRange(0, 99999) /* For mobile devices */
    navigator.clipboard.writeText(result.value)
    alert('copied!')
  }
</script>
