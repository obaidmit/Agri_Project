import sys
import json
import pandas as pd
import numpy as np
import joblib
import sklearn
import matplotlib.pyplot as plt
import seaborn as sns
import json


state = sys.argv[1]
district = sys.argv[2]
season = sys.argv[3]
crop = sys.argv[4]
area = int(sys.argv[5])


f = open("encoder_mapping.json", 'r')
mapping = json.load(f)
state = mapping['le_State_Name_mapping'][state]
district = mapping['le_District_Name_mapping'][district]
season = mapping['le_Season_mapping'][season]
crop = mapping['le_Crop_mapping'][crop]


data = np.array([[state,district,2000,season,crop,area]])

# load model from disk
filename = "yp_RF_model.sav"
loaded_model = joblib.load(filename)

result = loaded_model.predict(np.array(data))
crop_yield = np.round(result,2)


print ("Predicted Yield is approximately: ", crop_yield, "tons.")
