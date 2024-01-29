document.addEventListener("DOMContentLoaded", () => {
  const links = Array.from(document.querySelectorAll('[data-ym]')),
    ymId = 90558459;

  links.map(link => {
    link.onclick = function () {
      const attr = link.getAttribute('data-ym');
      window.ym(ymId, 'reachGoal', `click_${attr}`);
    }
  })

  const percentage = [25, 50, 75, 100],
    heightPage = document.documentElement,
    body = document.body,
    scrollTop = 'scrollTop',
    scrollHeight = 'scrollHeight';
  let percent;

  window.onscroll = function () {
    percent = (heightPage[scrollTop] || body[scrollTop]) / ((heightPage[scrollHeight] || body[scrollHeight]) - heightPage.clientHeight) * 100;

    percentage.map((item, idx) => {
      if (Math.round(percent) >= item || Math.round(percent) >= item + 24) {
        window.ym(ymId, 'reachGoal', `scrollDepth_${item}`, {URL: document.location.href});
        percentage.splice(idx, 1);
        return true;
      }
    })
  }
});
