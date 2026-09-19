export function Card({
  title = 'Card title',
  subtitle = 'teste',
  description = 'Describe what this card do',
  buttonLabel = 'Click here',
  cardUrl = '#',
}) {
  return `
    <a href="${cardUrl}" class="flex-col card">
      <div class="card-header flex-col" style="gap: 4px !important">
        <small>${subtitle}</small>
        <h3>${title}</h3>
      </div>
      <div class="card-body">
        <p>${description}</p>
      </div>
      <div class="card-footer">
        ${buttonLabel}
      </div>
    </a>
  `;
}
