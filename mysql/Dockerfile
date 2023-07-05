FROM mysql:5.7.22
COPY ./my.cnf /etc/mysql/
# Make the conf files not writeable so mysql will read them
RUN chmod a-w /etc/mysql/my.cnf
