export function DotTimeline({
  index,
  isFirst,
  isLast,
  image = '',
  metadataDate = 'vard title',
  title = 'vard title',
  description = 'Describe what this vard do',
  metadataLocation = 'Card title',
}) {
  return `
    <div class="dot-timeline">
      <div class="flex-col timeline" >
        <hr style="background-color: ${isFirst ? 'transparent' : 'var(--color-background)'};">
        <div
          style="
            width: 20px;
            height: 20px;
            border-radius: var(--radius-pill);
            background: ${isFirst ? 'var(--color-link)' : 'var(--color-background)'}
          "
        ></div>
        <hr style="background-color: ${isLast ? 'transparent' : 'var(--color-background)'};">
      </div>

      <div class="timeline-content">
        <div 
          class="image"
          style="
            border-radius: ${index % 2 === 0 ? '64px 48px 58px 64px' : '44px 58px 62px 44px'};
            background: ${isFirst ? 'var(--color-secondary-100)' : 'var(--color-primary-100)'}
          "
        >
          <img src="${image}" style="object-fit: contain;"/>
        </div>

        <div>
          <span style="color: ${isFirst ? 'var(--color-link)' : 'var(--color-text-muted)'}; font-size: var(--font-size-small)">
            ${metadataDate}
          </span>
          <h5>${title}</h5>
          ${description}
          <span style="color: var(--color-text-muted); font-size: var(--font-size-small)">
            ${metadataLocation}
          </span>
        </div>
      </div>
    </div>
  `;
}
