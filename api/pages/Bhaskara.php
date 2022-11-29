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
  <span class="p-2 border rounded fs-2">Δ = b² - 4.a.c</span>
</div>

<span class="mb-2 text-secondary">Preencha os valores para o calculo</span>
<form class="d-flex flex-row w-50 gap-3 mb-3">
  <div class="input-group has-validation">
    <span class="input-group-text rounded-0 rounded-start">A</span>
    <input type="number" value=0 class="form-control" id="valueA">
  </div>
  <div class="input-group has-validation">
    <span class="input-group-text rounded-0 rounded-start">B</span>
    <input type="number" value=0 class="form-control" id="valueB">
  </div>
  <div class="input-group has-validation">
    <span class="input-group-text rounded-0 rounded-start">C</span>
    <input type="number" value=0 class="form-control" id="valueC">
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
    const A = parseInt(document.getElementById('valueA').value),
      B = parseInt(document.getElementById('valueB').value),
      C = parseInt(document.getElementById('valueC').value)

    var delta = B * B - 4 * A * C,
    x1 = (-B + Math.sqrt(delta)) / (2 * A)
    x2 = (-B - Math.sqrt(delta)) / (2 * A)

    result.textContent = "Δ = b² - 4.a.c\n"
    result.textContent += `Δ = ${B}² - 4.${A}.${C}\n`
    result.textContent += `Δ = ${B * B} - ${4 * A * C}\n`
    result.textContent += `Δ = ${delta}\n\n`
    result.textContent += "-------------------------\n\n"
    if (delta < 0) {
      result.textContent += "O delta é negativo e não possui raizes reais\n"
      return
    }
    result.textContent += "X = (-b ± √Δ) / 2.a\n"
    result.textContent += `X = (${-B} ± √${delta}) / 2.${A}\n`
    result.textContent += `X¹ = (${-B} + ${Math.sqrt(delta)}) / ${2 * A}\n`
    result.textContent += `X¹ = ${-B + Math.sqrt(delta)} / ${2 * A}\n`
    result.textContent += `X¹ = ${x1.toFixed(1)}\n\n`
    result.textContent += "-------------------------\n\n"
    result.textContent += `X² = (${-B} - ${Math.sqrt(delta)}) / ${2 * A}\n`
    result.textContent += `X² = ${-B - Math.sqrt(delta)} / ${2 * A}\n`
    result.textContent += `X² = ${x2.toFixed(1)}\n\n`
    result.textContent += "-------------------------\n\n"
    result.textContent += `Resultado Final: (X¹ = ${x1.toFixed(1)}, X²= ${x2.toFixed(1)})`
  }

  const copy = () => {
    result.select()
    result.setSelectionRange(0, 99999) /* For mobile devices */
    navigator.clipboard.writeText(result.value)
    alert('copiado')
  }
</script>