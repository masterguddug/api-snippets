from flask import Flask, request
from twilio.twiml.messaging_response import MessagingResponse
import re

app = Flask(__name__)

@app.route('/whatsapp', methods=['POST'])
def whatsapp_bot():
    incoming_message = request.values.get('Body', '').lower()

    if contains_link(incoming_message):
        response_message = "Warning: Please do not send links in this group."
    else:
        response_message = "Thank you for your message."

    response = MessagingResponse()
    response.message(response_message)

    return str(response)

def contains_link(text):
    link_pattern = r'http[s]?://[^\s<>"]+|www\.[^\s<>"]+'
    return bool(re.search(link_pattern, text))

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8080)
