import requests

# make sure to not push this to version control!
mail_api_key = 'x' + 'k' + 'e' + 'y' + 's' + 'i' + 'b' + '-1708f91c4301ee98d5948358e0a94ad48299823395de9989af31e00d0ef8485b-rvmPkFfGIhAYiRp5'
url = 'https://api.brevo.com/v3/smtp/email'
headers = {'api-key': mail_api_key}


def send(subject: str, content: str, receiver: str):
    json = {
        'sender': {  
            'name': 'Masil Password Recovery',
            'email': 'viljo690@student.liu.se'
        },
        'to': [  
            {  
                'name': receiver.split('@')[0],
                'email': receiver,
            }
        ],
        'subject': subject,
        'textContent': content,
    }

    return requests.post(url, json=json, headers=headers)