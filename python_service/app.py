from fastapi import FastAPI, Request

app = FastAPI()

@app.get("/health")
def health():
    return {"service": "python-ai", "status": "ok"}


@app.post("/analyze")
async def analyze(request: Request):
    data = await request.json()
    # 🔹 Do something with the input
    text = data.get("text", "")
    # For now, just echo back
    return {"received_text": text, "analysis": "dummy-result"}
