#!/usr/bin/python3
from flask import Flask, render_template, request
from ignore.design import design
app = design.Design(Flask(__name__), __file__, 'Vsnippet #28 - Business logic money transfer')

##
#   YesWeHack - Vulnerable Code Snippet
##

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
    message = ''
    try:
        withdrawAmount = float(paramURL.get('amount'))
        if withdrawAmount is not None and withdrawAmount <= user.Balance:
            user.Withdraw(withdrawAmount)
            message = f'<b style="color:lightgreen">You withdraw {user.Currency} : {str(withdrawAmount)}</b>!'
        else:
            message = f'<b style="color:red">You don\'t have that much!</b>'
    except:
        pass

    return render_template('index.html', 
        username = user.User,
        balance = str(user.Balance),
        message = message
    )

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1337, debug=True)