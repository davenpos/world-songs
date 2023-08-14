import os
import gspread
from oauth2client.service_account import ServiceAccountCredentials

sheet_id = os.environ.get("SHEET_ID")
client_id = os.environ.get("CLIENT_ID")
client_email = os.environ.get("CLIENT_EMAIL")
private_key_id = os.environ.get("PRIVATE_KEY_ID")
private_key = os.environ.get("PRIVATE_KEY")

scope = ["https://spreadsheets.google.com/feeds", "https://www.googleapis.com/auth/drive"]
creds = ServiceAccountCredentials.from_json_keyfile_dict({
    "type": "service_account",
    "client_id": client_id,
    "client_email": client_email,
    "private_key_id": private_key_id,
    "private_key": private_key,
}, scope)
client = gspread.authorize(creds)

sheet = client.open_by_key(sheet_id).sheet1
data = sheet.get_all_values()

with open("WorldSongs.csv", "w") as csv_file:
    for row in data:
        csv_file.write(",".join(row) + "\n")
