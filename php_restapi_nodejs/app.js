const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const mysql = require('mysql');

const port = 3030;
const session = require('express-session');
const jwt = require('jsonwebtoken');
const path = require('path');
const password_hash = require('password-hash');

const date = require('date-and-time');

// const dateFormat = require('dateformat');
// console.log(dateFormat(new Date(), "ddd mmm dd yyyy HH:MM:ss UTC" ));
const now = new Date();
date.format(now, 'YYYY/MM/DD');

var cors = require('cors');
 
// parse application/json
app.use(session({
	secret: 'secret',
	resave: true,
	saveUninitialized: true
}));
app.use(bodyParser.urlencoded({extended : true}));
app.use(bodyParser.json());
 
app.use(function(req, res, next) {
	res.setHeader("Access-Control-Allow-Origin", "*");
	res.setHeader(
		"Access-Control-Allow-Headers",
		"*, Origin, X-Requested-With, Content-Type, Accept"
		);
	res.setHeader('Access-Control-Allow-Methods', 'GET, HEAD, POST, OPTIONS, PUT, PATCH, DELETE');
	res.setHeader('Access-Control-Expose-Headers', '*, Authorization');  
	res.setHeader('Access-Control-Allow-Credentials', true);
	res.setHeader("Content-Type", "application/json");
	next();
});





// First you need to create a connection to the database
// Be sure to replace 'user' and 'password' with the correct values
const con = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'admindatabase',
  database: 'db_crud'
});

con.connect((err) => {
  if(err){
    console.log('Error connecting to Db');
    return;
  }
  console.log('Connection established');
});




var cek = new Date();
var datestring = cek.getFullYear() + "-" + ("0" + (cek.getMonth()+1)).slice(-2) + "-" + 
("0" + cek.getDate()).slice(-2) + " " + ("0" + cek.getHours()).slice(-2) + ":" + 
("0" + cek.getMinutes()).slice(-2) + ":" + ("0" + cek.getSeconds()).slice(-2);





app.use(bodyParser.json());

app.post('/user', (req, res) => {
  res.send({
    message: 'CREATE NEW USER: POST /user',
    body: req.body
  });
});

app.get('/api/user',(req, res) => {
  let sql = "SELECT * FROM tb_crud ORDER BY nama ASC";
	  let query = con.query(sql, (err, results) => {
		    if(err) throw err;
		    res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
        // res.send(JSON.stringify({"status": 200, "error": null, "response": results[1].nama}));
	  });
});


app.get('/api/user/:id', (req, res) => {
 
  let sql = "SELECT * FROM tb_crud WHERE id = "+req.params.id;
  let query = con.query(sql, (err, results) => {
      if(err) throw err;
      res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
  });


  // let sql = "SELECT * FROM tb_crud ORDER BY nama ASC";
	//   let query = con.query(sql, (err, results) => {
	// 	    if(err) throw err;
	// 	    res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	//   });


  });

  app.post('/api/user',(req, res) => {
	  let data = {nama: req.body.nama, description: req.body.description, modified: datestring};
		  let sql = "INSERT INTO tb_crud SET ?";
		  let query = con.query(sql, data,(err, results) => {
			    if(err) throw err;
			    res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
		  });
	});

  app.put('/api/user/:id',(req, res) => {
	  let sql = "UPDATE tb_crud SET nama='"+req.body.nama+"',description='"+req.body.description+"', modified='"+datestring+"' WHERE Id = "+req.params.id;
	  let query = con.query(sql, (err, results) => {
		    if(err) throw err;
		    res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	  });
});

app.delete('/api/user/:id',(req, res) => {
  let sql = "DELETE FROM tb_crud WHERE Id = "+req.params.id+"";
  let query = con.query(sql, (err, results) => {
      if(err) throw err;
        res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
  });
});

  // app.patch('/user/:id', (req, res) => {
  //   const msg = {
  //   message: 'UPDATE USER: PATCH /user/' + req.params.id,
  //   body: req.body
  //   };
  //   res.send(msg);
  //   });


  //   app.delete('/user/:id', (req, res) => {
  //     res.send('DELETE USER: DELETE /user/' + req.params.id);
  //     });

app.listen(port, () => {
  console.log(`cli-nodejs-api listening at http://localhost:${port}`)
});