from fastapi import FastAPI, HTTPException
from fastapi.param_functions import Form
from fastapi.responses import JSONResponse
import mysql.connector
import hashlib

app = FastAPI()

conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="rems_project"
)

cursor = conn.cursor()


def validate_login(email: str, password: str):
    hashed_password = hashlib.md5(password.encode()).hexdigest()

    query = f"SELECT id, name FROM admin_tbl WHERE email = '{email}' AND password = '{hashed_password}'"
    cursor.execute(query)
    result = cursor.fetchone()

    if result:
        return result
    else:
        return None


@app.post('/login')
async def login(email: str = Form(...), password: str = Form(...)):
    # Validate the login credentials
    admin_data = validate_login(email, password)

    if admin_data:
        admin_id, admin_name = admin_data
        return {"message": "Login successful", "admin_id": admin_id, "admin_name": admin_name}
    else:
        raise HTTPException(status_code=401, detail="Invalid email or password")


@app.exception_handler(HTTPException)
async def http_exception_handler(request, exc):
    return JSONResponse(status_code=exc.status_code, content={"error": exc.detail})


@app.on_event("shutdown")
def shutdown_event():
    cursor.close()
    conn.close()
