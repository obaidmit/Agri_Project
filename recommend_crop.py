import sys
import json
import pandas as pd
import numpy as np
import joblib
import requests


def get_result(data):
    # load model from disk
    filename = "cr_RF_model.sav"
    loaded_model = joblib.load(filename)

    result = loaded_model.predict(np.array(data))
    recommended_crop = result
    return recommended_crop



state = sys.argv[1]
district = sys.argv[2]
pH = float(sys.argv[3])
potassium = float(sys.argv[4])
phosphorous = float(sys.argv[5])
nitrogen = float(sys.argv[6])



# source -> https://openweathermap.org/

api_key = "a74aa829821617b3f99dbb71ba635eba"    # Use your own API key. You can get it for free from openweathermap
  
base_url = "http://api.openweathermap.org/data/2.5/weather?"

complete_url = base_url + "appid=" + api_key + "&q=" + district 

response = requests.get(complete_url) 

x = response.json() 

print(" ")
if x['cod'] == '404':
    print("District data not available.........")
    data = np.array([[nitrogen, phosphorous, potassium, 22, 81, pH, 200]])
    print("Recommended Crop : ", get_result(data))
else:
    
    temperature = round((x['main']['temp']-273), 2)
    humidity = x['main']['humidity']
    rainfall = 220
    data = np.array([[nitrogen, phosphorous, potassium, temperature, humidity, pH, rainfall]])
    print("Recommended Crop : ", get_result(data))
    print("City : ", district)
    print("Temperature : ", temperature , "degree celcius")
    print("Humidity    :" , humidity)
    print(x)
