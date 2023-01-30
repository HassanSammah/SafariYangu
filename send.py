from flask import Flask , request, jsonify
import africastalking

app = Flask(__name__)


@app.route('/send-sms', methods=['GET', 'POST'])
def send_sms():
    phone_number = ["+255744242688"]
    message = "HONGERA UMELIPA 750/=, TICKET CODE YAKO NI 4kql , TAFADHALI NENDA KWENYE KITUO HUSIKA ONESHA KWA CHECKER"
    sender = "13371"

    africastalking.initialize(
    username='sandbox',
    api_key='6ea4d99d6644dff08c9cfdff6b9e09e62ac77e68e744b6aeb36e0d0e9aa94111'
    )

    sms = africastalking.SMS

    try:
        response = sms.send(message, phone_number, sender)
        print(response)
        return 'MESSAGE SENT'
    except Exception:
        print(f'{e} Error Occured')


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=7000)