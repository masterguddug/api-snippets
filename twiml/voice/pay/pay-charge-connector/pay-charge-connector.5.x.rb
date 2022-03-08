require 'twilio-ruby'

response = Twilio::TwiML::VoiceResponse.new
response.pay(charge_amount: '10.00', payment_connector: 'My_Payment_Connector', action: 'https://your-callback-function-url.com/pay')

puts response
