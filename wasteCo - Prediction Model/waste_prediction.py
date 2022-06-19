import streamlit as st
import pandas as pd
import pickle

filename = 'wasteModel.sav'
loaded_model = pickle.load(open(filename, 'rb'))

st.set_page_config(page_title="Go Green", page_icon="https://seeklogo.com/images/G/green-house-construction-building-logo-48080C9C2E-seeklogo.com.png", layout='wide', initial_sidebar_state='auto', menu_items=None)

st.image("Predict Waste Usage (2).png" )

mainContainer = st.container()

with mainContainer:

    tab = st.table()

    tab1 = tab.form(key='my_form')
    tab1.header("Want to know about the future wastage ?")

    #divide page into two coulumns
    col1 , col2 = tab1.columns(2)

    #take input year
    year = col1.text_input("Enter Year : ")
    #take input month
    month = col1.selectbox("Enter Month : " , ('January' ,'February', 'March', 'April', 'May', 'June', 'July' , 'August' , 'September' , 'October'
    , 'November' , 'December' ) , on_change=None)
    #take input date
    date = col1.selectbox("Select Day : " , ('1' ,'2', '3', '4', '5', '6', '7' , '8' , '9' , '10' , '11' , '12' , '13' , '14' , '15' , '16' , '17'
    , '18' , '19' , '19' , '20' , '21' , '22' , '23' , '24' ,'25' , '26' , '27' , '28' , '29' , '30' , '31' ) , on_change=None)

    type = col1.selectbox("Select Type : " , ('Plastic' ,'Rubber', 'Polythene', 'Wood', 'Glass', 'Paper') , on_change=None)

    Submit = tab1.form_submit_button("Submit")
    month_value = 0
    ty = 0
    if Submit:

        if month == "January":
            month_value = 1
        elif month == 'February':
            month_value = 2
        elif month == 'March':
            month_value = 3
        elif month == 'April':
            month_value = 4
        elif month == 'May':
            month_value = 5
        elif month == 'June':
            month_value = 6
        elif month == 'July':
            month_value = 7
        elif month == 'August':
            month_value = 8
        elif month == 'September':
            month_value = 9
        elif month == 'October':
            month_value = 10
        elif month == 'November':
            month_value = 11
        elif month == 'December':
            month_value = 12
    
        if type == 'Plastic':
            ty = 1
        elif type == 'Rubber':
            ty = 2
        elif type == 'Polythene':
            ty = 3
        elif type == 'Wood':
            y = 4
        elif type == 'Glass':
            ty = 5
        elif type == 'Paper':
            ty = 6

        predictions = loaded_model.predict([[date , month_value , int(year) , ty]])


        col2.subheader("Date :    " + date + " of " + month + " " + year)
        col2.subheader("Waste type :  " + type)
        col2.subheader("Amount :  " + str(predictions[0]) + " tons")



    

