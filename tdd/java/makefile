MVN := docker run -v $(shell pwd)/.m2:/root/.m2 -v $(shell pwd):/app --workdir /app maven:3.5-jdk-8 mvn
JAVA := docker run -v $(shell pwd):/app --workdir /app openjdk:8 java

install:
	$(MVN) install
