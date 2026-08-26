function Card({
  title = 'Card title',
  description = 'Describe what this card do',
  buttonLabel = 'Click here',
  buttonLink = '#',
}) {
  return `
    <div class="card">
        <div class="card-header">
          <h3>${title}</h3>
        </div>
        <div class="card-body">
          <p>${description}</p>
        </div>
        <div class="card-footer">
          <a href="${buttonLink}">${buttonLabel}</a>
        </div>
    </div>
  `;
}
