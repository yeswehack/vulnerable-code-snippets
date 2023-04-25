from flask import Flask, request, render_template
app = Flask(__name__)

##
#   YesWeHack - Vulnerable Code Snippet
##

#Run: python3 28-businessLogic.py

class Account:
    def __init__(self, username:str):
        self.User:str = username
        self.Currency:str = '€'
        self.Balance:float = 1000

    def Update_Balance(self, money:float): 
        self.Balance = money

    ##Withdraw from the users balance:
    def Withdraw(self, amount:float):
        if amount <= self.Balance:
            money = self.Balance - amount
            self.Update_Balance(money)
            return money
        return 0

def GetUserBySession():
    ##Code... (Get the user relative to the session and add the csrf token)
    return Account('Jerry')

user = GetUserBySession()

@app.route('/')
def index():
    paramURL = request.args
    withdraw_msg = ''
    try:
        withdrawAmount = float(paramURL.get('amount'))
        if withdrawAmount is not None:
            user.Withdraw(withdrawAmount)
            withdraw_msg = f'You withdraw {user.Currency}<b>{str(withdrawAmount)}</b>!'
    except:
        pass

    return render_template('withdraw.html', 
        username = user.User,
        balance = str(user.Balance),
        message = withdraw_msg
    )

if __name__ == '__main__':
    app.run(debug=True)
