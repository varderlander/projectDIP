# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re

class AppDynamicsJob(unittest.TestCase):
    def setUp(self):
        # AppDynamics will automatically override this web driver
        # as documented in https://docs.appdynamics.com/display/PRO44/Write+Your+First+Script
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(30)
        self.base_url = "https://www.google.com/"
        self.verificationErrors = []
        self.accept_next_alert = True
    
    def test_app_dynamics_job(self):
        driver = self.driver
        driver.find_element_by_xpath("//header[@id='tema']/div/div/a/img").click()
        driver.find_element_by_link_text(u"Войти").click()
        driver.find_element_by_name("login").click()
        driver.find_element_by_name("login").clear()
        driver.find_element_by_name("login").send_keys("hello")
        driver.find_element_by_name("pasw1").click()
        driver.find_element_by_name("pasw1").clear()
        driver.find_element_by_name("pasw1").send_keys("123")
        driver.find_element_by_id("vhodBTN").click()
    
