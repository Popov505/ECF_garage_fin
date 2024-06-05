/* Name of the page - START */

let currentPage = window.location.pathname

/* Name of the page - END */




/* Popup for the sources of the images in the footer - START */

let footerCourtesyButton = document.getElementById('footer_courtesy');
let footerCourtesyPopup = document.getElementById('footer_courtesy_popup');

footerCourtesyButton.addEventListener('click', ()=> {
  if(footerCourtesyPopup.classList.contains('invisible')) {
    footerCourtesyPopup.classList.replace('invisible', 'visible');
  } else {
    footerCourtesyPopup.classList.replace('visible', 'invisible');
  }
});

/* Popup for the sources of the images in the footer- END */


/* Sale page : filter of the ads - START */

if (currentPage == '/prestations/4') {

  let saleArticleFilters = document.getElementsByClassName('sale_article_filters')[0];

  saleArticleFilters.addEventListener('keyup', filterAds, false);
  saleArticleFilters.addEventListener('click', filterAds, false);
  window.addEventListener('load', filterAds, false);
  
  function filterAds() {
    let carAds = document.getElementsByClassName('sale_article_car');
    
    // Get the filter values
    let kmMin = document.getElementById('min_km').value;
    let kmMax = document.getElementById('max_km').value;
    let yearMin = document.getElementById('min_year').value;
    let yearMax = document.getElementById('max_year').value;
    let priceMin = document.getElementById('min_price').value;
    let priceMax = document.getElementById('max_price').value;
    let container = document.getElementById("car_container");

    // Create an object with the filter criterias
    let filterObject = {
      kmMin: kmMin,
      kmMax: kmMax,
      yearMin: yearMin,
      yearMax: yearMax,
      priceMin: priceMin,
      priceMax: priceMax
    };

    // Send the filter criterias to controller with AJAX (Methode 1)
    // Add the criterias in the URL of carFilter (request in background : not displayed)
    fetch('/carFilter?' + new URLSearchParams(filterObject),{
      method: 'GET',
      headers: {
          'Content-Type': 'application/json'
      },
    })
    // Get the data
    .then(res => {
      return res.json()
    })
    // Get the data in JSON format
    .then(data => {
      let innerHtml = "";
      data.forEach(car => {
        // Creation of the card for each car
        innerHtml += `
          <article class="sale_article_car">

            ${ car.imageName ?`<img src="/images/vente/cars/${ car.imageName }" alt="Photo of the car for sale : {{ car.title }}">`
          :`<img src="${ 'images/logo/logoGarage.svg' }" alt="Photo of the car for sale : {{ car.title }}">`}
            
            <div>
              <h3 class="sale_car_title">${ car.title }</h3>

              <ul>
                <li>Année : <em  class="year">${ car.build_year }</em></li>
                <li>Carburant : <em class="fuel">${ car.fuel }</em></li>
                <li>Kilométrage : <em class="km">${ car.kilometer }</em>km</li>
                <li>Prix : <em class="price">${ car.price }</em>€</li>
              </ul>
              <a href="/prestations/cars/${car.id}" class="link">Voir l'annonce</a>
            </div>
          </article>
          `;
      });
      container.innerHTML = innerHtml;
            
    })
    .catch(error => console.error(error));
    
  };

    /* Send the filter criterias to controller with AJAX (Methode 1)

      fetch('/carFilter?' + new URLSearchParams(filterObject),{
      method: 'GET',
      headers: {
          'Content-Type': 'application/json'
      },
    })
    //.then(response => response.json())
    .then(res => {
      return res.json()
    })
    .then(data => {
      container.replaceChildren();
      data.forEach(car => {

        const articleNode = document.createElement('article');
        articleNode.classList.add('sale_article_car');
        const imageNode = document.createElement('img');
        imageNode.setAttribute("src" , "/images/vente/cars/"+car.imageName);
        imageNode.setAttribute("alt", "Photo of the car for sale" +car.title) ;
        const divNode = document.createElement('div');
        divNode.classList.add('sale_article_car');
        const h3Node = document.createElement('h3');
        h3Node.classList.add('sale_car_title');
        h3Node.appendChild(document.createTextNode(car.title));
        const ulNode = document.createElement('ul');
        
        const KmliNode = document.createElement('li');
        KmliNode.appendChild(document.createTextNode('Kilomètres : ' + car.kilometer + 'km'));
        const YearliNode = document.createElement('li');
        YearliNode.appendChild(document.createTextNode('Année : ' + car.build_year));
        const FuelliNode = document.createElement('li');
        FuelliNode.appendChild(document.createTextNode('Fuel : ' + car.fuel));
        const PriceliNode = document.createElement('li');
        PriceliNode.appendChild(document.createTextNode('Prix :' + car.price + '€'));

        ulNode.appendChild(KmliNode);
        ulNode.appendChild(YearliNode);
        ulNode.appendChild(FuelliNode);
        ulNode.appendChild(PriceliNode);
        divNode.appendChild(h3Node);
        divNode.appendChild(ulNode);

        articleNode.appendChild(imageNode);
        articleNode.appendChild(divNode);
        container.appendChild(articleNode);
      });            
    })
    .catch(error => console.error(error));
  };
  */
};

/* Sale page : filter of the ads - END */


/* Home page : Carousel of the opinions - START */

if (currentPage == '/') {

  let previousButton = document.getElementById('previous_button');
  let nextButton = document.getElementById('next_button');
  
  let slides = document.querySelectorAll('.slide');
  
  let elementNumber = slides.length;
  let activeKey = 0;
  let nextKey = 0;

  displayCarousel(activeKey, elementNumber, slides);

  previousButton.addEventListener('click', ()=> {
    nextKey =  (activeKey - 1);
    if (nextKey > 0) 
    {
      activeKey = (activeKey - 1);
    } else
    {
      activeKey = (elementNumber - 1);
    }
    displayCarousel(activeKey, elementNumber, slides);
  });

  nextButton.addEventListener('click', ()=> {
    nextKey =  (activeKey + 1);
    if (nextKey < (elementNumber)) 
    {
      activeKey = (activeKey + 1);
    } else
    {
      activeKey = 0;
    }
    displayCarousel(activeKey, elementNumber, slides);
  });
}

function displayCarousel(activeKey, elementNumber, slides) {
  for (let i = 0; i < elementNumber; i++) {
    if (i == activeKey) {
      slides[i].classList.remove('invisible');
    }
    else
    {
      slides[i].classList.add('invisible');
    }
  };
}

/* Home page : Carousel of the opinions - START */