const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage();

  console.log('Checking Homepage...');
  await page.goto('http://localhost:8000/');
  await page.screenshot({ path: 'homepage_final.png', fullPage: true });

  const newsHeading = await page.$('text=Aktuelles');
  if (newsHeading) {
      console.log('Homepage news section found.');
  } else {
      console.log('Homepage news section NOT found.');
  }

  console.log('Checking Articles Index...');
  await page.goto('http://localhost:8000/artikel');
  await page.screenshot({ path: 'articles_index_final.png', fullPage: true });

  const articles = await page.$$('article');
  console.log(`Found ${articles.length} articles on index page.`);

  await browser.close();
})();
