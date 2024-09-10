# Use the official image as a parent image
FROM ubuntu

# Update the system
RUN apt-get update

# Install OpenSSH Server
RUN apt-get install -y openssh-server

# Set up configuration for SSH
RUN mkdir /var/run/sshd
RUN echo 'root:secret_password' | chpasswd

# Remove default motd
RUN chmod -x /etc/update-motd.d/*

# Copy the SSH configuration file & banner
COPY sshd_config /etc/ssh/sshd_config
COPY banner /etc/ssh/banner

ENV NOTVISIBLE "in users profile"
RUN echo "export VISIBLE=now" >> /etc/profile



# Set environment variables
ENV COMMONER_PASSWORD="gdsc_rocks"
ENV MEMBER_PASSWORD="GDSC{Welcome_to_the_GDSC_FST}"
ENV DEPARTMENT_MEMBER_PASSWORD="GDSC{Can_u_climb_higher?}"
ENV CORE_TEAM_PASSWORD="GDSC{hmmm_u_r_better_than_i_thought}"
ENV GDSC_LEAD_PASSWORD="GDSC{good_job_agent_gdsc}"

# Create users with specific home directories
RUN useradd -m -s /bin/bash -p "$(openssl passwd -1 $COMMONER_PASSWORD)" commoner && \
    useradd -m -s /bin/bash -p "$(openssl passwd -1 $MEMBER_PASSWORD)" member && \
    useradd -m -s /bin/bash -p "$(openssl passwd -1 $DEPARTMENT_MEMBER_PASSWORD)" department_member && \
    useradd -m -s /bin/bash -p "$(openssl passwd -1 $CORE_TEAM_PASSWORD)" core_team && \
    useradd -m -s /bin/bash -p "$(openssl passwd -1 $GDSC_LEAD_PASSWORD)" gdsc_lead 

# Copy files to user home directories
COPY ./files/commoner /home/commoner/
RUN chown -R commoner:commoner /home/commoner
COPY ./files/member /home/member/
RUN chown -R member:member /home/member
COPY ./files/department_member /home/department_member/
RUN chown -R department_member:department_member /home/department_member
COPY ./files/core_team /home/core_team/
RUN chown -R core_team:core_team /home/core_team
COPY ./files/gdsc_lead /home/gdsc_lead/
RUN chown -R gdsc_lead:gdsc_lead /home/gdsc_lead

# Expose the SSH port
EXPOSE 22 

# Run SSH
CMD ["/usr/sbin/sshd", "-D"]
