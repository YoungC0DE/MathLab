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
  <span class="p-2 border rounded fs-2">Fn = fn-1 + Fn-2</span>
</div>

<span class="mb-2 text-secondary">Preencha os valores para o calculo</span>
<form class="d-flex flex-row w-50 gap-3 mb-3">
  <div class="input-group has-validation">
    <span class="input-group-text rounded-0 rounded-start">The value</span>
    <input type="number" min=0 value=0 class="form-control" id="limitN">
    <span class="input-group-text rounded-0">Is equal to</span>
    <input type="number" placeholder="-" class="form-control rounded-0" id="valueF" readonly>
    <span class="input-group-text rounded-0 rounded-end">In the Fibonacci sequence</span>
  </div>
</form>

<div class="d-flex flex-row gap-3">
  <button type="button" class="btn btn-secondary mb-3 rounded-1" onclick="clean()">Clear</button>
  <button type="button" class="btn btn-primary mb-3 rounded-1" onclick="calc()">Calc</button>
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
    const limitN = parseInt(document.getElementById('limitN').value)
    let a1 = 1,
    a2 = 1,
    a3 = 0

    clean()
    result.textContent += `${a1} ➩ ${a2} ➩ `

    for(let i = 3; i <= limitN; i++){
      a3 = a1 + a2
      result.textContent += `${a3} ➩ `
      a2 = a1
      a1 = a3
    }
    document.getElementById('valueF').value = a3
  }

  const copy = () => {
    result.select()
    result.setSelectionRange(0, 99999) /* For mobile devices */
    navigator.clipboard.writeText(result.value)
    alert('copied!')
  }
</script>
