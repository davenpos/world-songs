import os
import gspread
from oauth2client.service_account import ServiceAccountCredentials

sheet_id = os.environ.get("SHEET_ID")

scope = ["https://spreadsheets.google.com/feeds", "https://www.googleapis.com/auth/drive"]
creds = ServiceAccountCredentials.from_json_keyfile_dict({
    "type": "service_account",
    "client_id": "114749483058588739419",
    "client_email": "github-account@worldsongs.iam.gserviceaccount.com",
    "private_key_id": "d0c20c4b86daf7d76d5383950a75c3cb8b594e77",
    "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDkiiTSHmpFZcXD\n9k6jueV+nl7J/6CmL4ycwqf0ZSR5S2z0+KYqGy6whzIWDpk2cjDDgTzUSbr067vU\nvtKrL+gdR1vwq8HV05Y02zFHy20PbHsWraWzHrth4gAcWRGK+keObt0PH1EEPEQi\nGxvScduQQ+RXsQzygIak9Su1RztuDVAAXDlfq5CXo2/aQoFh+rl6BO3pPhHhuGMW\nTtZyGIoh/v7OlqMPt5lkeBuhdIfby5d6dJKKAFhg7ur1rpyamSQBFdsiTzIl4AcA\n4biMYdNfbg98c4zdXWIleND/6FKFBw86hAWfGbCnGu5AqklQDd6CpBye/rtTXDNT\nMwV897bVAgMBAAECggEADm6Ezbn69v/qwamrpJ4oFltU3Aem8uecxwdpyL6cU4aG\nTl/nSlBmHeKjsI3icfQ7DRV7rGItiqraNSCJuCKx0yt+7E9EUcbnPNY8oe6AKBGv\nIir8BDgkGBXH8QJU38RXQXDRx9Mv8AcIPGke1Ca5eT44TKtTCHtCRWdwB6YEZDoX\nbPy0N5vAziNRPnpHuhHxHEvHY8I0r2BV8w2dULtfWV2BLKj5IrGE3dJRMzEWQ2Mn\nF0Gj00OmuQjypp6TgY+77hk+u5o8RrDYMABkxrocuXhidUsjGbnl1UIH4/TfbTmK\nxbq1OfF1HNW3ta9G64Xp4Pmloq45t+nAT5jZqHN0wQKBgQD3vSoywpNExduOG3io\nkRtJK2rZ7V/EY/fagSu8UAHUcVeFFIW/vlH7DbnHGG6HJJ2faOZVIh7E5BvBZWfn\nKRz5lPWg6VCLw4h5U7sDxeV82m+a7ItA4I6+ZgN+qeFPPGmDtYmigUPZc2JBON+3\nlLtMwPlnrl24nmgSs2rWCNCiYQKBgQDsKRVPni3j17YqsE/pbyBg66qlAgxcDcGw\nTWibnJ48ZwVnl5oSMjX76L+Q6IPDYoA94ZICFvjd1F/g0HCkDXn4Y7PM7b8JTMbn\n2BtOm+8mU6+u8fpF7xMk1hNsAgnlfi+/N1D9yJVZnKSxZcEw940/dgsq8e/DI5a9\nGo96AU5Q9QKBgQCTwg9ZFxQfAKNirp/YajOMAIlKUXm8+KLrf/9F4bI1syQwC316\nT1k2E4mqZbgGgqBAY6B9RkxzwlmLj5/ZD3xon5+gyYdw1L6hHn98UJv/S4klLdAg\ncc6xYMbU1R281JtaIvxkIBUHrPn9TJ6iL+NGdBJM9IKRimkoPjqKTdeiAQKBgFjm\nslYRhtbxmmsBimOm6LpznP6XAc4Zg6N50HpcABle8uLnaCGXc0kMeijzzr5bs0kY\nRF2zBiaDz0ATV4P6asL9zW7ExRicJXibmtQB0YpNEKK8BuoSsNM6H3+WWOFimljS\nWxPeUZK1bC43zv0/A5YzOssE3qxIFnPDruVP3oqNAoGBAM8nyw0t5Pm0khtHGxhi\nr5b5HsDdWDzfurBeG+NwHtTEuMGhW7vo6HlDqrqW1nGhrerVLZD4IRTj1OKFlW2l\ndDfOCPDTVA0fn23BXEyWuFN61OOohegclmboaWWfl2cyUFOaQRSyzy5Ap+QmypvF\nJDqncIzTUWWQsnMuGJgNxuL1\n-----END PRIVATE KEY-----\n",
}, scope)
client = gspread.authorize(creds)

sheet = client.open_by_key(sheet_id).sheet1
data = sheet.get_all_values()

with open("WorldSongs.csv", "w") as csv_file:
    for row in data:
        csv_file.write(",".join(row) + "\n")
