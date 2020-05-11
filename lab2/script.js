const ajax = new XMLHttpRequest();

function getGamesByLeague() {
  let league = document.getElementById("league").value;
  ajax.onreadystatechange = updateLeague;
  ajax.open("GET", "getGamesByLeague.php?league=" + league);
  ajax.send(null);
}

function updateLeague() {
  if (ajax.readyState === 4) {
    if (ajax.status === 200) {
      let text = document.getElementById('league-table');
      let res = ajax.responseText;
      let resHtml = "";
      let newReq = [];

      let lastReqHtml = "";
      let lastReq = JSON.parse(localStorage.getItem("league"));

      res = JSON.parse(res);

      res.forEach(game => {
        resHtml += "<tr><td style = 'border: 1px solid'>" + game["title"] + "</td><td style = 'border: 1px solid'>" + game["winner"] + "</td><td style = 'border: 1px solid'>" + game["date"] + "</td></tr>";
        newReq.push([game["title"],game["winner"],game["date"]]);
      });

      if (lastReq == null) {
        lastReqHtml += "<tr><td style = 'border: 1px solid'> there are no recent reqs </td></tr>";
        document.getElementById("leagueRecent-table").innerHTML = lastReqHtml;
      } else {
        lastReq.forEach(vendor => {
          lastReqHtml += "<tr><td style = 'border: 1px solid'>" + vendor + "</td></tr>";
        });
        document.getElementById("leagueRecent-table").innerHTML = lastReqHtml;
      }
      localStorage.setItem("league", JSON.stringify(newReq));
      text.innerHTML = resHtml;
    }
  }
}

function getGamesByTeam() {
  let name = document.getElementById("teamname").value;

  ajax.onreadystatechange = updateItems;
  ajax.open("GET", "GetGamesByTeam.php?name="+name);
  ajax.send(null);
}

function updateItems() {
  if (ajax.readyState === 4) {
    if (ajax.status === 200) {
      let text = document.getElementById('teamGames-table');
      let res = ajax.responseText;
      alert(res)
      let resHtml = "";
      let newReq = [];

      let lastReqHtml = "";
      let lastReq = JSON.parse(localStorage.getItem("teamGames"));

      res = JSON.parse(res);
      res.forEach(game => {
        resHtml += "<tr><td style = 'border: 1px solid'>" + game["title"] + "</td><td style = 'border: 1px solid'>" + game["winner"] + "</td><td style = 'border: 1px solid'>" + game["date"] + "</td></tr>";
        newReq.push([game["title"],game["winner"],game["date"]]);
      });

      if (lastReq == null) {
        lastReqHtml += "<tr><td style = 'border: 1px solid'> there are no recent reqs </td></tr>";
        document.getElementById("teamGamesRecent-table").innerHTML = lastReqHtml;
      } else {
        lastReq.forEach(game => {
          lastReqHtml += "<tr><td style = 'border: 1px solid'>" + game + "</td></tr>";
        });
        document.getElementById("teamGamesRecent-table").innerHTML = lastReqHtml;
      }
      localStorage.setItem("teamGames", JSON.stringify(newReq));
      text.innerHTML = resHtml;
    }
  }
}

function getTeam() {
  let name = document.getElementById("name").value;
  ajax.onreadystatechange = updateTeam;
  ajax.open("GET", "getPlayersByTeam.php?name=" + name);
  ajax.send(null);
}

function updateTeam() {
  if (ajax.readyState === 4) {
    if (ajax.status === 200) {
      let text = document.getElementById('team-table');
      let res = ajax.responseText;
      let newReq = [];
      let lastReqHtml = "";
      let lastReq = JSON.parse(localStorage.getItem("team"));
      let resHtml = "";

      res = JSON.parse(res);

      res.forEach(player => {
        resHtml += "<tr><td style = 'border: 1px solid'>" + player + "</td></tr>";
        newReq.push(player);
      });

      if (lastReq == null) {
        lastReqHtml += "<tr><td style = 'border: 1px solid'> there are no recent reqs </td></tr>";
        document.getElementById("teamResent-table").innerHTML = lastReqHtml;
      } else {
        lastReq.forEach(item => {
          lastReqHtml += "<tr><td style = 'border: 1px solid'>" + item + "</td></tr>";
        });
        document.getElementById("teamResent-table").innerHTML = lastReqHtml;
      }

      localStorage.setItem("team", JSON.stringify(newReq));
      text.innerHTML = resHtml;
    }
  }
}