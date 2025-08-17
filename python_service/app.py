from fastapi import FastAPI

app = FastAPI()

@app.get("/health")
def health():
    return {"service": "python-ai", "status": "ok"}
