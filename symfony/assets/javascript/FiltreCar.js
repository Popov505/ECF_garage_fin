function ShowUsers(){
	//Request initialization
	const xhr = new XMLHttpRequest();
	xhr.open('GET', '');
	
	//Request return
	xhr.addEventListener('readystatechange', function() {
		//Transfer done, operation complete
		if(xhr.readyState === 4) {
			//Success
			if(xhr.status === 200) {
				//Ajax request response
        console.log('Response = ' + xhr.response);

        //JSON conversion
        let myhtml = '';
        const object = JSON.parse(xhr.response);
        object.data.array.forEach(element => {
          myhtml += '<div><p>'+element.id+'</p></div>'
        });

        //Display of the response
        document.getElementById('allUtilisateurs').innerHTML = myhtml;

			}
			//Page not found
			else if(xhr.status === 404){
				alert("Impossible de trouver l'url de la requête AJAX");
			}
			//Other error
			else{
				alert('Une erreur est survenue');
			}
    }
  })
}