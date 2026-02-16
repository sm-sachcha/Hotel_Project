<style type="text/css">

    label{
    display: inline-block;
    width: 200px;
    font-weight: 600;
}

/* spacing between rows */
.div_deg{
    padding: 12px 0;
}

/* center the form on the page */
.form-wrapper{
    min-height: calc(100vh - 120px);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* bordered form box */
.form-box{
    background: #373737;
    border: 1px solid #7f7f7f;
    border-radius: 10px;
    padding: 30px 40px;
    width: 550px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* input styles */
.form-box input[type="text"],
.form-box input[type="number"],
.form-box input[type="file"],
.form-box textarea,
.form-box select{
    width: 250px;
    padding: 8px 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

/* textarea fix */
.form-box textarea{
    width: 250px;
    height: 80px;
}

/* submit button center */
.submit-row{
    text-align: center;
    margin-top: 20px;
}
.center {
    text-align: center;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 10px;
    position: relative;
}

/* underline line */
.center::after {
    content: "";
    display: block;
    width: 120px;
    height: 3px;
    background-color: #006644;
    margin: 8px auto 0;
    border-radius: 2px;
}




/* Full width bordered button */
.btn-full {
    width: 100%;             /* takes full container width */
    padding: 14px 0;         /* taller button */
    font-size: 16px;
}

/* Combine with previous bordered style */
.btn-border {
    display: inline-block;
    font-weight: 600;
    color: #007c30;          
    background: #ffffff;     
    border: 2px solid #007319;
    border-radius: 30px;     
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
}

/* Hover effect */
.btn-border:hover {
    background: #004d08;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(13, 110, 253, 0.3);
}


.center-block {
    text-align: center;  
    font-size: 32px;     
    font-weight: 700;
    color: #03abf3; 
    padding: 5px 0;  
    border-bottom: 3px solid #8bb9ff; 
    width: 100%;    
    box-sizing: border-box;  
}

/* ==================View Data========================= */

table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    td img {
        max-width: 100px;
        height: auto;
        border-radius: 5px;
    }

  </style>