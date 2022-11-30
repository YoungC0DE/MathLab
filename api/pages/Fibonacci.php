<style>
  .form-control {
    box-shadow: none !important;
  }

  #result {
    min-height: 180px;
    max-height: 180px;
    overflow: auto;
  }
</style>

<div class="text-center align-middle mb-5">
  <span class="p-2 border rounded fs-2">Fn = fn-1 + Fn-2</span>
</div>

<span class="mb-2 text-secondary">Preencha os valores para o calculo</span>
<form class="d-flex flex-row w-50 gap-3 mb-3">
  <div class="input-group has-validation">
    <span class="input-group-text rounded-0 rounded-start">O valor</span>
    <input type="number" min=0 value=0 class="form-control" id="limitN">
    <span class="input-group-text rounded-0">É igual a</span>
    <input type="number" placeholder="-" class="form-control rounded-0" id="valueF" readonly>
    <span class="input-group-text rounded-0 rounded-end">Na sequência Fibonacci</span>
  </div>
</form>

<div class="d-flex flex-row gap-3">
  <button type="button" class="btn btn-secondary mb-3 rounded-1" onclick="clean()">Limpar</button>
  <button type="button" class="btn btn-primary mb-3 rounded-1" onclick="calc()">Calcular</button>
  <button type="button" class="btn btn-secondary mb-3 rounded-1" onclick="copy()">Copiar</button>
</div>

<div class="form-floating w-50">
  <textarea class="form-control text-center" id="result" readonly></textarea>
  <label for="result">Resolução:</label>
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
    alert('copiado')
  }
</script>